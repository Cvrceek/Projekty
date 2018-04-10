<?php
    $db = new MySQLDB();

    if(isset($_POST['save_article'])) {
        $update = array(
            'header' => $_POST['header'],
            'content' => $_POST['text'],
            
        );
        $db->update("products", $update, array('id' => $_POST['id']));
        //header('location: index.php?pg=articles&edit='. $_POST['id']);
        header('location: index.php?pg=articles');
    }

    if(isset($_POST['add_article'])) 
    {
        if(isset($_FILES['img']))
        {
           $filename = $_FILES['img']['tmp_name'];
            if(getimagesize($filename) == false)
            {
              echo "Please select an image"; 
            }
            else
            {
               $image = file_get_contents($_FILES['img']['tmp_name']);
               $image = base64_encode($image);
              
            
                $insert = array(
                    'img' => $image,
                    'header' => $_POST['header'],
                    'content' => $_POST['text'],
                    'posted_date' => date("Y-m-d", time()),  
                );
        
                $db->insert("products", $insert);
        
                $tmp = $db->get_results("SELECT * FROM products ORDER BY id DESC");
                $last_post_id = $tmp[0]['id'];
                
                header('location: index.php?pg=articles');
            }
        }
      
      else
      echo "Please select an isset";  
    }

    if(isset($_POST['delete_no'])) {
        header('location: index.php?pg=articles');
    }
    
    if(isset($_POST['delete_yes'])) {
        $db->delete("products", array('id' => $_POST['delete_id']), 1);
        header('location: index.php?pg=articles');
    }
?>

<article id="hlavni">
    <section>
        <h2>Articles</h2>
        
        <?php
            if(isset($_GET['edit']) || isset($_GET['new'])) {
                list($art_id, $art_header, $art_content, $art_img) = $db->get_row("SELECT id, header, content, img FROM products WHERE id='$_GET[edit]'");
        ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <label>Header</label>
                    <input type="text" name="header" value="<?php echo($art_header) ?>">
                    <label>Image</label>
                    <?php if($art_id == "") { ?> 
                        <input type="file" name="img">
                    <?php } ?>    
                    <label>Text</label>
                    <textarea name="text"><?php echo($art_content) ?></textarea>
                    
                    <input type="hidden" name="id" value="<?php echo($art_id); ?>">
                    <div class="clearfix"></div>
                    <?php if($art_id == "") { ?>
                        <input class="send_post" type="submit" name="add_article" value="Add article">
                    <?php } else {?>
                        <input class="send_post" type="submit" name="save_article" value="Save article">
                    <?php } ?>
                </form>
                <div class="clearfix"></div>
        <?php
            }
            elseif($_GET['delete']) {
                list($art_header) = $db->get_row("SELECT header FROM products WHERE id='$_GET[delete]'");
                echo("Really want to delete Article? \"<b>". $art_header ."\"</b>");
                ?>
                <form action="" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo($_GET['delete']);?>">
                    <input class="delete" type="submit" name="delete_yes" value="Yes">
                    <input class="delete" type="submit" name="delete_no" value="No">
                </form>
        <?php } else { ?>
        
        <table>
            <thead>
                <tr>
                    <td id="edit"><a href="index.php?pg=articles&new">Přidat produkt</a></td>
                    <td>Jméno produktu</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $articles = $db->get_results("SELECT * FROM products");
                foreach($articles as $article) {
                ?>
                <tr>
                    <td>
                        <a href="index.php?pg=articles&edit=<?php echo($article['id']); ?>">Edit</a> | <a href="index.php?pg=articles&delete=<?php echo($article['id']); ?>">Delete</a>
                    </td>
                    <td><a href=""><?php echo($article['header']); ?></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>
    </section>
</article>