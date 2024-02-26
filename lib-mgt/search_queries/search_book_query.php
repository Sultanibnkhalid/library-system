<?php

include_once '../../inc/connect.php';

//select all students
if (isset($_POST['call_type']) && $_POST['call_type'] == "search_book") {
	$text_to_search = app_db()->CleanDBData($_POST['text_search_book']);
	$query = app_db()->Select("SELECT book.Book_ID,book.FileName,book.Book_Title,book.Author,book.Subject,book.Photo,book.Publisher,book.Publishing_Date, book.Pages,book.NumberOfCopies,book.Locker_No,book.status,category.Category_Name FROM book join category on book.Category_ID=category.Category_ID where CONCAT(book.Book_Title,book.Author,book.Subject)LIKE '%$text_to_search%' ;");
	if ($query) {
?>
		<thead style="z-index: 1;">
			<tr>
				<!-- <th>الرقم</th> -->
				<th scope="col">الغلاف</th>
				<th scope="col">العنوان</th>
				<th scope="col">المؤلف</th>
				<th scope="col">الموضوع</th>
				<th scope="col">عدد النسخ</th>
				<th scope="col">الحالة</th>
				<th scope="col">الصنف</th>
				<th scope="col">المكان</th>
				<th scope="col">الناشر</th>
				<th scope="col">تاريخ النشر</th>
				<!-- <th scope="col">الرقم المكتبي</th> -->
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 0;
			$staus = "متوفر";
			foreach ($query as $row) {
				++$no;
				$img_src = "images/" . $no . ".jpg";
			?>

				<tr scope="row" pNO="<?php echo $row['Pages'] ?>"  row_id="<?php echo $row['Book_ID'] ?>">
					<td>

						<div class="imgs" edit_type="click" pic="<?php echo $row['Photo'] ?>" pdf="<?php echo $row['FileName'] ?>">
							<img class="cover_img" id="img_<?php echo $no ?>" src="" width="40px" height="60px" ;>
						</div>
					</td>



					<td>
						<div class="row_data" edit_type="click" col_name="Book_Title">
							<?php echo $row['Book_Title'] ?>
						</div>
					</td>
					<td>
						<div class="row_data" edit_type="click" col_name="Author">
							<?php echo $row['Author'] ?>
						</div>
					</td>
					<!-- ثاثة -->
					<td>
						<div class="row_data" edit_type="click" col_name="Subject">
							<?php echo $row['Subject'] ?>
						</div>
					</td>
					<td>
						<div class="row_data" edit_type="click" col_name="numberOfcopis">
							<?php echo $row['NumberOfCopies'] ?>
						</div>
					</td>
					<td>
						<div class="row_data" edit_type="click" col_name="status">
						<?php echo ($row['status']==1)?'متاح':'غير متاح'; ?>
						</div>
					</td>
					<!-- ثلاثة -->
					<td>
						<div class="row_data" edit_type="click" col_name="Category_Name">
							<?php echo $row['Category_Name'] ?>
						</div>
					</td>
					<td>
						<div class="row_data" edit_type="click" col_name="Locker_No">
							<?php echo $row['Locker_No'] ?>
						</div>
					</td>
					<td>
						<div class="row_data" edit_type="click" col_name="Publisher">
							<?php echo $row['Publisher'] ?>
						</div>
					</td>
					<td>
						<div class="row_data" edit_type="click" col_name="Publishing_Date">
							<?php echo $row['Publishing_Date'] ?>
						</div>
					</td>
					<td>
						<a href="#" class="btn_update_book btn btn-success btn-sm btn-flat" row_id="<?php echo $row['Book_ID'] ?>" ><?php echo "تعديل" ?><i class="fa fa-edit"></i> </a>
						<a href="#" class="btn_delete_book btn btn btn-danger btn-sm delete btn-flat" row_id="<?php echo $row['Book_ID'] ?>" ><?php echo "حذف" ?><i class="fa fa-trash"></i> </a>
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