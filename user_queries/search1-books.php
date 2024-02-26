<?php
include 'inc/connect.php';
if(isset($_GET['submit'])){
    $text_to_search=app_db()->CleanDBData($_GET['bname']);
    $query = app_db()->Select("SELECT book.Book_ID,book.FileName,book.Book_Title,book.Author,book.Subject,book.Photo,book.Publisher,book.Publishing_Date, book.Pages,book.NumberOfCopies,book.Locker_No,book.status,category.Category_Name FROM book join category on book.Category_ID=category.Category_ID where CONCAT(book.Book_Title,book.Author,book.Subject)LIKE '%$text_to_search%';");

    if($query){
        ?>
        <ul>
            <?php
        foreach($query as $row){
?>
    <li>
        <a href="search-books.php?bid=<?php echo $row['Book_ID'];  ?>">
           <p>
            <?php echo $row['Book_Title'].'--'.$row['Author'].'--'.$row['Subject'].'--'.$row['Publishing_Date']; ?>
             </p>
            </a>
        </li>
        <?php
        }
        ?>
        </ul>
        <?php
    }
    else{
        echo'<p>لا يوجد اي بيانات لبحثك </p>';
    }
}


if(isset($_GET['bid'])){
    $bid=app_db()->CleanDBData($_GET['bid']);
    $query = app_db()->Select("SELECT book.Book_ID,book.FileName,book.Book_Title,book.Author,book.Subject,book.Photo,book.Publisher,book.Publishing_Date, book.Pages,book.NumberOfCopies,book.Locker_No,book.status,category.Category_Name FROM book join category on book.Category_ID=category.Category_ID where book.Book_ID=$bid;");

    if($query){
        ?>
        <ul>
            <?php
        foreach($query as $row){
?>
    <li><?php echo 'عنوان:'.$row['Book_Title'] ?> </li>
    <li><?php echo 'موصوع:'.$row['Subject'] ?> </li>
    <li><?php echo 'مؤلف:'.$row['Author'] ?> </li>
    <li><?php echo 'الناشر:'.$row['Publisher'] ?> </li>
    <li><?php echo $row['NumberOfCopies'].'نسخة'?> </li>
    <li><?php echo $row['Pages'].'صفحة' ?> </li>
    <li><?php echo 'عام:'.$row['Publishing_Date'] ?> </li>
    <li><?php echo 'مكان:'.$row['Locker_No'] ?> </li>



        <?php
        }
        ?>
        </ul>
        <?php
    }
        else{
            echo'<p>لا يوجد اي بيانات لبحثك </p>';
        }
    
}
?>
