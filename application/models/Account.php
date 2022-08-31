<?php

namespace application\models;

use application\core\Model;


class Account extends Model
{
    private $countryModel;
    private $companyModel;

    public function __construct()
    {
        parent::__construct();
        $this->countryModel = new Country;
        $this->companyModel = new Company;
    }

    public static function validateForm(array $formData): bool
    {
        $isValid = !empty($formData);

        if (!empty($formData)) {
            /*'fields' => [ first_name, last_name, birthdate, report_subject,
            country, phone, email, company, position, about, photo]*/
            if (empty($formData['first_name'])) {
                $isValid = false;
            }
            if (empty($formData['last_name'])) {
                $isValid = false;
            }
            if (empty($formData['birthdate'])) {
                $isValid = false;
            }
            if (empty($formData['report_subject'])) {
                $isValid = false;
            }
            if (empty($formData['country'])) {
                $isValid = false;
            }
            if (empty($formData['phone'])) {
                $isValid = false;
            }
            if (empty($formData['email'])) {
                $isValid = false;
            }
            return $isValid;
            // if(array_search(Null, $formData)){
            //     $isValid = false;
            // }
        }
    }

    public function signUp(array $memberData)
    {
        if (Account::validateForm($memberData)) {
            $this->insertMember($memberData);
        }
    }

    public function setCompanyId(array $formData = []): array
    {
        $companyData = $formData['company'];
        if (!empty($companyData)) {
            $companyId = $this->companyModel->getCompanyId($companyData);
            if (empty($companyId)) {
                $this->companyModel->addComppany($companyData);
                $companyId = $this->companyModel->getCompanyId($companyData);
            }
            $formData['company'] = $companyId;
        }
        return $formData;
    }

    public function setCountryId(array $formData = []): array
    {
        $countryData = explode("_", $formData['country']);
        $country = [
            'name' => $countryData[1],
            'code' => $countryData[0]
        ];
        $countryId = $this->countryModel->getCountryId($country['code']);
        if (empty($countryId)) {
            $this->countryModel->addCountry($country);
            $countryId = $this->countryModel->getCountryId($country['code']);
        }
        
        $formData['country'] = $countryId;
        return $formData;
    }

    public function insertMember($formData = [])
    {
        try {
            $this->setCountryId($formData);
            $this->setCompanyId($formData);
            $result = $this->db->column("INSERT INTO members 
            (id, first_name, last_name, birthdate, report_subject,
            country, phone, email, company, position, about, photo)
            VALUES( Null, ':first_name',
                    ':last_name', ':birthdate',
                    ':report_subject', '',
                    ':phone', ':email',
                    ':company', ':position',
                    ':about_me', ':photo' )", $formData);
            debug($formData);
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }

    public function getMembers()
    {
        /*photo Отображать фото при регистрации или дефолтное, если фото 
        не было загружено
        full name Выводить полное имя в одной ячейке
        report subject
        email Выводить ссылкой*/
        $result = $this->db->row('SELECT photo, first_name, last_name, report_subject, email FROM members');
        return $result;
    }
}
