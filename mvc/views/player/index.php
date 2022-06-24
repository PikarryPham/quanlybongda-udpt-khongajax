<?php
require APPROOT . '/views/includes/header.php';

?>
<div class="m-main">
    <div class="m-navbar">
        <?php
            require APPROOT . '/views/includes/sidebar.php';

            $club_id        = 0;
            $name_player    = "";
            $national_name  = "";
            $position_name  = "";

            if(isset($_POST['submit'])){
                $club_id        = $_POST['club'];
                $name_player    = $_POST['name'];
                $national_name  = $_POST['national'];
                $position_name  = $_POST['position'];
            }

        ?>

    </div>

    <div class="m-content">
        <div class="m-content-header">
            <div class="m-title">Danh sách cầu thủ <?php if (isset($data['clbtarget'])) print " : " .  $data['clb']['ClubName']; ?></div>

            <a style="text-decoration:none;text-align:center;line-height:40px" href="<?php echo URLROOT; ?>/players/create" id="btnAddEmployee" class="m-btn m-button-icon m-icon-add">
                Thêm cầu thủ
            </a>
        </div>
        <div class="m-content-toolbar">
            <div class="m-toolbar-left" style="display:flex">

                <form action="<?= URLROOT ?>/Players/filterPlayer" method="post">

                    <input id="search" type="text" name="name" class="m-input m-input-icon m-icon-search" value="<?php echo $name_player ?>"placeholder="Lọc theo tên, câu lạc bộ" />
                    <select class="m-select" name="club" id="">
                        <option value="0">Tất cả đội bóng</option>

                        <?php foreach ($data['club'] as $c) : ?>
                            <option value="<?php echo $c['ClubID'] ?>" <?php if ($c['ClubID'] == $club_id) echo 'selected'?> > <a href="<?php echo URLROOT ?>/players/groupPlayer/<?= $c['ClubID'] ?>"><?php echo $c['ClubName'] ?></a> </option>
                        <?php endforeach ?>

                    </select>
                    <select class="m-select" name="national" id="">
                        <option value="">Tất cả quốc gia</option>

                        <?php foreach ($data['nationality'] as $c) : ?>
                            <option value="<?php echo $c['Nationality'] ?>" <?php if ($c['Nationality'] == $national_name) echo 'selected'?>><?php echo $c['Nationality'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <select class="m-select" name="position" id="">
                        <option value="">Tất cả vị trí</option>

                        <?php foreach ($data['positions'] as $c) : ?>
                            <option value="<?php echo $c['Position'] ?>" <?php if ($c['Position'] == $position_name) echo 'selected'?> ><?php echo $c['Position'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="hidden" name="submit" value="true">
                    <button style="margin-left: 5px;" type="sumbit" href="" class="m-btn ">Lọc</button>
                </form>

            </div>
            <div class="m-toolbar-right">
                <button style="margin-right: 10px;" class="m-btn-refresh"></button>
                <a style="text-align: center;text-decoration:none;
    line-height: 40px;" id="btnDelete" class="m-btn m-btn-success">
                    Xóa
                </a>
            </div>
        </div>
        <div class="m-page-content">
            <?php if (isset($data['player'])) { ?>
                <div class="table">

                    <table class="m-table">
                        <thead>
                            <tr>

                                <th class="text-align-center">
                                    <label style="display: block;" for="">All</label>
                                    <input type="checkbox" id="checkboxall" class="m-checkbox" value="0" />

                                </th>
                                <th class="text-align-center">
                                    Tên cầu thủ
                                </th>
                                <th class="text-align-center">Câu lạc bộ</th>

                                <th class="text-align-center">
                                    Vị trí
                                </th>
                                <th class="text-align-center" style="width: 150px">
                                    DOB
                                </th>
                                <th class="text-align-center" style="width: 50px">
                                    Quốc gia
                                </th>
                                <th class="text-align-center" style="width: 100px">
                                    Số
                                </th>
                                <th class="text-align-center" style="width: 100px">
                                    Hành động
                                </th>
                            </tr>
                        </thead>
                        <?php foreach ($data['player'] as $p) : ?>
                            <tbody>


                                <tr>
                                    <td class="text-align-center">
                                        <input value="<?php echo  $p['PlayerID'] ?>" type="checkbox" class="m-checkbox" name="playerid[]" />
                                    </td>

                                    <td class="text-align-center"><?php echo  $p['FullName']; ?></td>

                                    <td class="text-align-center">
                                        <?php echo  $p['ClubName']; ?>
                                    </td>
                                    <td class="text-align-center">
                                        <?php echo  $p['Position']; ?>

                                    </td>
                                    <td class="text-align-center">
                                        <?php echo  $p['DOB']; ?>

                                    </td>
                                    <td class="text-align-center">
                                        <?php echo  $p['Nationality']; ?>


                                    </td>
                                    <td class="text-align-center">
                                        <?php echo  $p['Number']; ?>

                                    </td>

                                    <td class="text-align-center">
                                        <a href="<?php echo URLROOT ?>/players/edit/<?= $p['PlayerID'] ?>"> <i style=" margin-right: 5px ; color:#33FFFF" class="icon1 fa-solid fa-pen-to-square"></i></a>
                                        <a href="<?php echo URLROOT ?>/players/delete/<?= $p['PlayerID'] ?>"> <i style="color:red" class="icon1 fa-solid fa-trash-can"></i></a>



                                    </td>
                                </tr>

                            <?php endforeach; ?>
                            </tbody>

                    </table>


                </div>
                <div class="paging">
                    <div class="paging-left">
                        Hiển thị 10 thông tin 1 trang
                    </div>
                    <div class="paging-center">
                        <a href="<?= $data['type'] ?>&page=1">
                            <button class="first-page">
                                <i class="fas fa-angle-double-left"></i>
                            </button>
                        </a>
                        <a href="<?= $data['type'] ?>&page=<?php if ($data['page'] != 1) {
                                                                echo $data['page'] - 1;
                                                            } else {
                                                                echo $data['page'];
                                                            } ?>">
                            <button class="prev-page">
                                <i class="fas fa-angle-left"></i>
                            </button>
                        </a>
                        <div class="list-page-group">
                            <?php
                            for ($i = $data['start_page']; $i <= $data['end_page']; $i++) {
                                if ($data['page'] == $i) {
                                    echo "<button class='page-number selected'>$i</button>";
                                } else {
                                    echo "<a href='" . $data['type'] . "&page=$i'><button class='page-number'>$i</button></a>";
                                }
                            }
                            ?>
                        </div>
                        <a href="<?= $data['type'] ?>&page=<?php if ($data['page'] != $data['number_page']) {
                                                                echo $data['page'] + 1;
                                                            } else {
                                                                echo $data['page'];
                                                            } ?>">
                            <button class="next-page">
                                <i class="fas fa-angle-right"></i>
                            </button>
                        </a>
                        <a href="<?= $data['type'] ?>&page=<?= $data['number_page'] ?>">
                            <button class="last-page">
                                <i class="fas fa-angle-double-right"></i>
                            </button>
                        </a>
                    </div>
                    <div class="paging-right">
                        <select class="m-select" name="" id="">
                            <option value="10">
                                10 thông tin/trang
                            </option>
                            <option value="20">
                                20 thông tin/trang
                            </option>
                            <option value="50">
                                50 thông tin/trang
                            </option>
                        </select>
                    </div>
                </div>

            <?php } else {
                echo "<div> <h2>Không có cầu thủ nào !</h2></div>";
            } ?>

        </div>
        <script>
            var checkedbox = document.getElementsByClassName('m-checkbox');
            var checkboxall = document.getElementById('checkboxall');
            var ids = [];


            // multy delete 

            for (var c of checkedbox) {
                c.addEventListener('change', function() {
                    if (this.checked == true) {
                        ids.push(this.value);
                    } else {
                        ids = ids.filter(e => e !== this.value);
                        checkboxall.checked = false;
                        ids = ids.filter(e => e !== '0');
                    }

                })
            }
            // end multy delete

            checkboxall.addEventListener("change", function(){
                ids = [];
                if (this.checked == true) {
                    for (var c of checkedbox) {
                        c.checked = true;
                        ids.push(c.value);
                    }
                }else{
                    for (var c of checkedbox) {
                        c.checked = false;
                    }
                }
            })

            var clickdelete = document.getElementById('btnDelete');
            clickdelete.addEventListener('click', function() {
                console.log(ids);
                var url = '<?php echo URLROOT; ?>/Players/multydelete/' + ids;
                clickdelete.setAttribute("href", url);

            })
        </script>


        <?php
        require APPROOT . '/views/includes/footer.php';


        ?>