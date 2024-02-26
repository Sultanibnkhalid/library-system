<?php
include_once '../../inc/connect.php';

//select all students
if ($_SERVER['REQUEST_METHOD']=='GET') {
	$query = app_db()->Select("SELECT book.Book_ID,book.Book_Title,book.Author,book.Publishing_Date,book.status,category.Category_Name FROM book join category on book.Category_ID=category.Category_ID where book.status>0 ;");
	if ($query) {
?>
    <table class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
		<thead style="z-index: 1;">
			<tr>
				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending">No.</th>
			 
				<th scope="col">العنوان</th>
				<th scope="col">المؤلف</th>
				<th scope="col">الحالة</th>
				<th scope="col" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending">تاريخ النشر</th>
				 
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 0;
			$staus = "متوفر";
			foreach ($query as $row) {
				++$no;
			 
			?>

				<tr scope="row" row_id="<?php echo $row['Book_ID'] ?>">
				 

                 <td class="sorting_1">
						 
							<?php echo $no; ?>
						 
					</td>
					 


					<td>
					 
							<?php echo $row['Book_Title'] ?>
						 
					</td>
					<td>
						 
							<?php echo $row['Author'] ?>
						 
					</td>
					 
					<td> 
						<?php echo ($row['status']==1)?'متاح':'غير متاح'; ?>
						 
					</td>
					<!-- ثلاثة -->
					 
					<td>
						 
							<?php echo $row['Publishing_Date'] ?>
						 
					</td>
					 
				</tr>

			<?php
			}
			?>




		</tbody>
        </table>
	<?php



	} else {
	?><tr>
			<td><?php echo "لا يوجد تحت هذه البيانات" ?> </td>
		</tr>
<?php
	}
}
?>
