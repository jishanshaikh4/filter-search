<?php 

include("config.php");
$all_brand=$db->query("SELECT distinct brand FROM `products` WHERE category_id = '1' GROUP BY brand");
$all_material=$db->query("SELECT distinct material FROM `products` WHERE category_id = '1' GROUP BY material");
$all_size=$db->query("SELECT distinct size FROM `products` WHERE category_id = '1' GROUP BY size");
// Filter query
    $sql= "SELECT distinct id FROM `products` WHERE category_id = '1'";
    if(isset($_GET['brand']) && $_GET['brand']!="") :
        $brand = $_GET['brand'];
        $sql.=" AND brand IN ('".implode("','",$brand)."')";
    endif;

    if(isset($_GET['material']) && $_GET['material']!="") :
        $material = $_GET['material'];
        $sql.=" AND material IN ('".implode("','",$material)."')";
    endif;

    if(isset($_GET['size']) && $_GET['size']!="") :
        $size = $_GET['size'];
        $sql.=" AND size IN (".implode(',',$size).")";
    endif;
    $all_product=$db->query($sql);
    $content_per_page = 3;
    $rowcount=mysqli_num_rows($all_product);
    $total_data = ceil($rowcount / $content_per_page);
    function data_clean($str)
    {
        return str_replace(' ','_',$str);
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Checkbox search filtering using PHP, Bootstrap, and Jquery | Jishan Shaikh</title>
 
        <link rel="stylesheet" type='text/css' href="_/plugins/bootstrap.min.css">
        <link rel="stylesheet" type='text/css' href="_/plugins/font-awesome.css">
        <link rel="stylesheet" type='text/css' href="_/css/style.css">
        <!--[Add this line if lt Internet explorer 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery -->
        <script src="_/plugins/jquery.js"></script>
    </head>
    <body>
    <div class="content">

        <div class="container-fluid">
            <form method="get" id="search_form">
                <br> <!-- For a little upper margin -->
                <div class="row">
                    <!-- sidebar -->
                    <aside class="col-lg-3 col-md-4">
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Shop by Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php foreach ($all_brand as $key => $new_brand) :
                                    if(isset($_GET['brand'])) :
                                        if(in_array(data_clean($new_brand['brand']),$_GET['brand'])) : 
                                            $check='checked="checked"';
                                        else : $check="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_brand['brand']);?>" <?=@$check?> name="brand[]" class="sort_rang brand"><?=ucfirst($new_brand['brand']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelTwo" aria-expanded="true">Shop by Material</h3></div>
                            <div class="panel-body collapse in" id="panelTwo">
                                <ul class="list-group">
                                <?php foreach ($all_material as $key => $new_material) :
                                    if(isset($_GET['material'])) :
                                        if(in_array(data_clean($new_material['material']),$_GET['material'])) : 
                                            $material_check='checked="checked"';
                                        else : $material_check="";
                                        endif;
                                    endif;
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_material['material']); ?>" <?=@$material_check?>  name="material[]" class="sort_rang material"><?=ucfirst($new_material['material']); ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelThree" aria-expanded="true">Shop by Size</h3></div>
                            <div class="panel-body collapse out" id="panelThree">
                                <ul class="list-group">
                                    <?php foreach ($all_size as $key => $new_size) : 
                                        if(isset($_GET['size'])) :
                                            if(in_array($new_size['size'],$_GET['size'])) : 
                                                $size_check='checked="checked"';
                                            else : $size_check="";
                                            endif;
                                        endif;
                                    ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?=$new_size['size']; ?>" <?=@$size_check?>  name="size[]" class="sort_rang size"><?=$new_size['size']; ?></label></div>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </aside> <!-- /.sidebar -->
                    <section class="col-lg-9 col-md-8">
                        <div class="row">
                            <div id="results"></div>
                        </div>
                    </section>
                </div>
            </form>
        </div> <!-- /.content -->
        <!-- external -->
    </div>

	<!-- added js files for better loading -->
        <script src="_/plugins/bootstrap.min.js"></script>
        <script src="_/js/script.js"></script>
    </body>
</html>

<script type="text/javascript">
$(document).ready(function(){
    var total_record = 0;
    var brand=check_box_values('brand');
    var material=check_box_values('material');
    var size=check_box_values('size');
    var total_groups = <?php echo $total_data; ?>;
    $('#results').load("autoload.php?group_no="+total_record+"&brand="+brand+"&material="+material+"&size="+size,  function(){
        total_record++;
    });
    $(window).scroll(function(){       
        if($(window).scrollTop() + $(window).height() == $(document).height()){    
            if(total_record <= total_groups){
                loading = true;
                $('.loader').show();
                $.get("autoload.php?group_no="+total_record+"&brand="+brand+"&material="+material+"&size="+size,
                function(data){ 
                    if(data != ""){                               
                        $("#results").append(data);
                        $('.loader').hide();                  
                        total_record++;
                    }
                });     
            }
            // Increment total record;
        }
    });
    function check_box_values(check_box_class){
        var values = new Array();
            $("."+check_box_class+":checked").each(function(){
               values.push($(this).val());
            });
        return values;
    }
    $('.sort_rang').change(function(){
        $("#search_form").submit();
        return false;
    });
});
	
</script>

<!-- That's it, Voila! Made it in 3 days. Congratulations (Jishan). -->
