<?php
require_once('./template/header.php');
$data = select($conn);
$countPage = pagination_count($conn);
?>

<div class="container">
<div class="chieps-field"></div>
    <div class="row justify-content-center">    
        <div class="col-lg-4 col-md-6 col-sm-10">
            <h1 class="mt-3 mb-5">Книга контактов</h1>            
            <form class="mb-5">
                <div class="form-group">
                    <label for="userName"><small>Ваше имя</small></label>
                    <input type="text" class="form-control name" id="userName" name="name">
                </div>
                <div class="form-group">
                    <label for="userSurname"><small>Ваша фамилия</small></label>
                    <input type="text" class="form-control surname" id="userSurname" name="surname">
                </div>
                <div class="form-group">
                    <label for="userPhoneNumber"><small>Ваш номер телефона</small></label>
                    <input type="text" class="form-control phone" id="userPhoneNumber" name="phone" onkeyup="this.value = this.value.replace(/[^\d]/g,'');">
                </div>
                <button type="text" class="btn btn-primary sendBtn">Добавить</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-10 mainDiv">
            <?php
                $out = '';
                for ($i = 0; $i < count($data); $i++) {
                    $out .= "<div class='contactCard mt-3 text-center p-2 bg-success text-white'>";
                    $out .= "<span class='deleteBtn check-delete text-white' data='{$data[$i]['id']}'>&#215;</span>";
                    $out .= "<p><span class='mr-2'>{$data[$i]['name']}</span><span>{$data[$i]['surname']}</span></p>";
                    $out .= "<p>{$data[$i]['phone_number']}</p>";
                    $out .= "</div>";
                }
                echo $out;
            ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <nav class="mt-5">
            <ul class="pagination">
                <?php
                    for ($i = 0; $i < $countPage; $i++) {
                        $j = $i + 1;
                        echo "<li class='page-item'><a class='page-link' href='./index.php?page={$i}'>{$j}</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </div>
        
</div>


<?php
require_once('./template/footer.php'); 
?>