<?php
include 'inc/connect.php';
if(isset($_GET['submit'])){
        $text_to_search=app_db()->CleanDBData($_GET['dname']);
    ;$query = app_db()->Select("SELECT document.Document_ID,document.Document_Title,document.Subject,document.Photo,document.Pages,document.NumberOfCopies,document.Locker_No,document.status,document.FileName,document.Author,document.PublishingYear,college.College_Name FROM `document`
    JOIN `college` on document.collage_ID=college.College_ID WHERE CONCAT(document.Document_Title,document.Subject,document.Author,document.PublishingYear) LIKE '%$text_to_search%' ;");

    if($query){
        ?>
        <ul>
            <?php
        foreach($query as $row){
?>
    <li>
        <a href="search-documents.php?did=<?php echo $row['Document_ID'];  ?>">
           <p>
            <?php echo $row['Document_Title'].'--'.$row['Subject'].'--'.$row['Author'].'--'.$row['PublishingYear'];; ?>
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


if(isset($_GET['did'])){
    $d_id=app_db()->CleanDBData($_GET['did']);
    $query = app_db()->Select("SELECT document.Document_ID,document.Document_Title,document.Subject,document.Photo,document.Pages,document.NumberOfCopies,document.Locker_No,document.status,document.FileName,document.Author,document.PublishingYear,college.College_Name FROM `document`
    JOIN `college` on document.collage_ID=college.College_ID where  document.Document_ID=$d_id;");

    if($query){
        ?>
        <ul>
            <?php
        foreach($query as $row){
?>
    <li><?php echo 'عنوان:'.$row['Document_Title'] ?> </li>
    <li><?php echo 'موصوع:'.$row['Subject'] ?> </li>
    <li><?php echo 'مؤلف:'.$row['Author'] ?> </li>
    <li><?php echo 'الكلية:'.$row['College_Name'] ?> </li>
    <li><?php echo $row['NumberOfCopies'].'.نسخة'?> </li>
    <li><?php echo $row['Pages'].'صفحة' ?> </li>
    <li><?php echo 'عام:'.$row['PublishingYear'] ?> </li>
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
