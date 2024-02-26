<?php
include_once '../../inc/connect.php';

//select all students
if ($_SERVER['REQUEST_METHOD']=='GET') {
	$query = app_db()->Select("SELECT borrowdetails.Transaction_ID,borrow.Borrow_Date,borrow.Due_Date,book.Book_Title FROM borrowdetails JOIN borrow ON borrowdetails.Transaction_ID=borrow.Transaction_ID JOIN book ON borrowdetails.Book_ID=book.Book_ID WHERE borrow.status=0");;
	if ($query) {
?>
    <table class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
		<thead style="z-index: 1;">
			<tr>
				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending">No.</th>
			 
				<th scope="col">عنوان الكتاب</th>
				<th scope="col">تاريخ الاعارة </th>
				<th scope="col" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending">تاريخ الارجاع</th>
				 
				 
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 0;
			 
			foreach ($query as $row) {
				++$no;
			 
			?>

				<tr scope="row" row_id="<?php echo $row['Transaction_ID'] ?>">
				 

                 <td class="sorting_1">
						 
							<?php echo $no; ?>
						 
					</td>
					<td>


				 
					 
							<?php echo $row['Book_Title'] ?>
						 
					</td>
					<td>
						 
							<?php echo $row['Borrow_Date'] ?>
						 
					</td>
					 
					<td> 
						<?php echo  $row['Due_Date'] ?>
						 
					</td>
					<!-- ثلاثة -->
					 
					 
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















?>