<header>
    <div id="map">
    </div>
</header>
<div class="container">
    <form class="wizzard-form" id="<?= $id; ?>" method="post">
        <?php $curr_page = 0; ?>
        <h2>
            <?= ucfirst($title); ?>
        </h2>
        <div class="wizzard-tab container">
            <?php foreach ($fields as $field) : ?>
                <?php if ($field['page'] !== $curr_page) : ?>
                    </div>
                    <div class="wizzard-tab container">
                    <?php $curr_page = $field['page']; ?>
                <?php endif; ?>
                <div class="form-group">
                    <div class="col col-sm-4 col-md-2">
                    <label for="<?= $field['id']; ?>">
                        <?= ucfirst($field['name']); ?>
                    </label>
                </div>
                <?php if ($field['type'] == 'select') : ?>
                    <div class="col col-sm-8 col-md-10">
                        <select name=<?= $field['name']; ?> title=<?= $field['name']; ?> id=<?= $field['id']; ?> class=<?= $field['class']; ?> <?= $field['required'] ? 'required' : '' ?> onselect="this.className = ''">
                            <option value='' selected>
                            <?= $field['selected']; ?>
                            </option>
                            <?php foreach ($field['options'] as $key => $name) : ?>
                                <option value='<?= $key; ?>'> 
                                <?= ucfirst($name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php else : ?>
                    <div class="col col-sm-8 col-md-10">
                        <input
                        type="<?= $field['type']; ?>" 
                        id="<?= $field['id']; ?>"  
                        class="col col-md-8 <?= $field['class'] ? $field['class'] : ''; ?>"                                     
                        <?= $field['placeholder'] ? "placeholder=".$field['placeholder'] : ''; ?> 
                        <?= $field['value'] ? "value=".$field['value'] : ''; ?> 
                        <?= $field['pattern'] ? "pattern=".$field['pattern'] : ''; ?> 
                        <?= $field['data-slots'] ? "data-slots=".$field['data-slots'] : ''; ?> 
                        <?= $field['required'] ? 'required' : ''; ?>
                        
                        oninput="this.className = <?= $field['class'] ? $field['class'] : ''; ?>">
                    </div>
                <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="wizzard-btns d-flex justify-content-between">
            <button 
                class="btn btn-secondary m-2" 
                type="button" 
                id="prevBtn" 
                onclick="nextPrev(-1)">
                Previous
            </button>
            <button 
                class="btn btn-success m-2" 
                type="button" 
                id="nextBtn" 
                onclick="nextPrev(1)">
                Next
            </button>
        </div>
        <div class="wizzard-circle-indicators">
            <?php for ($i = 0; $i <= $curr_page; $i++) : ?>
                <span class="step"></span>
            <?php endfor; ?>
        </div>
    </form>
</div>

<?php echo BOOTSTRAP_SCRIPT_JS; ?>
<script src="wizzardform.js"></script>
<script src="//maps.googleapis.com/maps/api/js?key=<?= MAP_API_KEY; ?>"></script>
<script src="loadmap.js"></script>