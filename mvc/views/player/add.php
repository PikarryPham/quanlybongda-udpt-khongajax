
           <?php
require APPROOT . '/views/includes/header.php';
        
            ?>
            <div class="m-main">
                <div class="m-navbar">
                <?php
require APPROOT . '/views/includes/sidebar.php';

                   
                ?>
                  
                </div>
                <div class="m-content">
                <div class="m-content-header">
                        <div class="m-title">Thêm cầu thủ</div>
                        
                    </div>
                    <div class="m-page-content" style="border-bottom: 1px solid grey;">
                        <form  action="<?= URLROOT ?>/Players/store" method="POST">
                        <div style="display: flex;">
                        <div style="margin-right: 50px;">
                        <div  class="input">
                                <label style="display: block;" for="">Họ tên cầu thủ</label>
                                <input required name="name" class="m-input" placeholder="Nhập tên cầu thủ" type="text">
                            </div>

                            <div class="input">
                                <label for="">Ngày sinh</label>
                                <input required  name="DOB" style="width:203px" class="m-input" placeholder="Nhập vị trí" type="date">
                            </div>
                            <div class="input">
                                <label for="">Vị trí</label>
                                <input required name="position" class="m-input" placeholder="Nhập vị trí" type="text">
                            </div>
                            
                        </div>
                            <div>
                            <div class="input">
                                <label for="">Quốc gia</label>
                                <input required name="national" class="m-input" placeholder="Nhập quốc gia" type="text">
                            </div>
                            
                            <div class="input">
                                <label for="">Số áo</label>
                                <input required name="number" class="m-input" placeholder="Nhập số áo" type="number">
                            </div>
                            <div class="input">
                                <label for="">Chọn câu lạc bộ</label>
                                <select class="m-select" name="club" id="">
                                    <?php foreach($data['club'] as $a): ?>
                                    <option  value="<?php echo $a['ClubID']  ?>"> <?php echo $a['ClubName']  ?></option>
                                   
                                    <?php endforeach ?>
                                </select>
                            </div>
                            </div>
                           
                        </div>
                       

<div style="display: block;" class="btn"><button name="submit" type="submit" class="m-btn">Thêm cầu thủ</button></div>
                        </form>
                    </div>



                    <?php
require APPROOT . '/views/includes/footer.php';

                    
                ?>
                