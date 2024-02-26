<?php

include_once '../../inc/connect.php';
//select all students
if (isset($_POST['call_type']) && $_POST['call_type'] == "search_document") {
	$text_to_search = app_db()->CleanDBData($_POST['text_search_doc']);
	$query = app_db()->Select("SELECT document.Document_ID,document.Document_Title,document.Subject,document.Photo,document.Pages,document.NumberOfCopies,document.Locker_No,document.status,document.FileName,document.Author,document.PublishingYear,college.College_Name FROM `document`
	JOIN `college` on document.collage_ID=college.College_ID WHERE CONCAT(document.Document_Title,document.Subject,document.Author,document.PublishingYear) LIKE '%$text_to_search%' ;");
	if ($query) {
?>
		<thead>
			<tr>
				<!-- <th>الرقم</th> -->
				<th scope="col">الغلاف</th>
				<th scope="col">العنوان</th>
				<th scope="col">المؤلف</th>
				<th scope="col">الموضوع</th>
				<th scope="col">عدد النسخ</th>
				<th scope="col">الحالة</th>
				<th scope="col">الكلية</th>
				<th scope="col">المكان</th>
				<!-- <th scope="col">الناشر</th> -->
				<th scope="col">تاريخ النشر</th>
				<!-- <th scope="col">الرقم المكتبي</th> -->
			</tr>
		</thead>
		<tbody>
			<?php
			$staus = "متوفر";
			foreach ($query as $row) {	
			?>
				<tr scope="row" pNo="<?php echo $row['Pages'] ?>" row_id="<?php echo $row['Document_ID'] ?>">
					<td>
						<div class="imgs" pic="<?php echo $row['Photo'] ?>" pdf="<?php echo $row['FileName'] ?>">
							<img class="cover_img"  width="40px" height="60px" ;>
						</div>
					</td>
					<td>
						<div class="row_data" col_name="Document_Title">
							<?php echo $row['Document_Title'] ?>
						</div>
					</td>
					<td>
						<div class="row_data"  col_name="Author">
							<?php echo $row['Author'] ?>
						</div>
					</td>
					<!-- ثاثة -->
					<td>
						<div class="row_data" col_name="Subject">
							<?php echo $row['Subject'] ?>
						</div>
					</td>
					<td>
						<div class="row_data" col_name="NumberOfCopies">
							<?php echo $row['NumberOfCopies'] ?>
						</div>
					</td>
					<td>
						<div class="row_data" col_name="status">
							<?php echo ($row['status']==1)?'متاح':'غير متاح'; ?>
						</div>
					</td>
					<!-- ثلاثة -->
					<td>
						<div class="row_data" col_name="College_Name">
							<?php echo $row['College_Name'] ?>
						</div>
					</td>
					<td>
						<div class="row_data"col_name="Locker_No">
							<?php echo $row['Locker_No'] ?>
						</div>
					</td>
					
					<td>
						<div class="row_data" col_name="PublishingYear">
							<?php echo $row['PublishingYear'] ?>
						</div>
					</td>
					<td>
						<a href="#" class="btn_update_doc btn btn-success btn-sm btn-flat" > تعديل <i class="fa fa-edit"></i> </a>

						<a href="#" row_id="<?php echo $row['Document_ID'] ?>" class="btn_delete_doc btn btn btn-danger btn-sm delete btn-flat" >حذف<i class="fa fa-trash"></i> </a>
					</td>
				</tr>

			<?php
			}
			?>




		</tbody>
	<?php



	} else {
	?><tr>
			<td><?php echo "لا يوجد تحت هذه البيانات" ?> </td>
		</tr>
<?php
	}
}
?>
<!-- <td>
	<div class="row_data" edit_type="click" col_name="Pages">
	</div>
</td> -->