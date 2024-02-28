<?php
/**
 * State Body Page
 */ 
$limit = $params['rows'];
$tRecords = $trecords;
$total_pages = ceil($tRecords/$limit);
// echo $total_pages;
if(isset($_GET['page']) and empty($_GET['page'])){
	$page_no = $_GET['page'];
}else {
	$page_no = 1;
}
$offset = $params['offset'];
if(session()->getFlashdata('status')){ ?>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<div class="alert alert-success">
					<strong>Hey!..</strong><?= session()->getFlashdata('status'); ?>
				</div>
			</div>
		
	</div>
</div>
<?php } ?>
<nav>
	<ul class="pagination"> 
		
	<?php
	if($page_no == 1){ ?>
		<li class="page-item disabled"><a class="page-link" href='http://localhost/ci4/public/states/indexBody?page=1' aria-disabled="true">First</a></li>
		<li class="page-item disabled"><a class="page-link" href='http://localhost/ci4/public/states/indexBody?page=<?= $page_no-1; ?>' aria-disabled="true">Prev</a></li>
	<?php } else { ?>
		<li class="page-item"><a class="page-link" href='http://localhost/ci4/public/states/indexBody?page=1'>First</a></li>
		<li class="page-item"><a class="page-link" href='http://localhost/ci4/public/states/indexBody?page=<?= $page_no-1; ?>'>Prev</a></li>
	<?php } ?>
	<?php for($i = 2;$i<=$total_pages; $i++) { ?>
		<li class="page-item"><a class="page-link" href="http://localhost/ci4/public/states/indexBody?page=<?= $i; ?>"><?= $i; ?></a></li>
	<?php } ?>
	<?php if($page_no == $total_pages) { ?>
		<li class="page-item disabled"><a class="page-link" href="http://localhost/ci4/public/states/indexBody?page=<?= $page_no+1; ?>">Next</a></li>
		<li class="page-item disabled"><a class="page-link" href="http://localhost/ci4/public/states/indexBody?page=<?= $total_pages; ?>">Last</a></li>
	<?php }else{ ?>
		<li class="page-item"><a class="page-link" href="http://localhost/ci4/public/states/indexBody?page=<?= $page_no+1; ?>">Next</a></li>
		<li class="page-item"><a class="page-link" href="http://localhost/ci4/public/states/indexBody?page=<?= $total_pages; ?>">Last</a></li>
	<?php } ?>
	</ul>
</nav>
<table class="table table-bordered caption-top">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Name</th>
			<th>Code</th>
			<th>Date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($states as $key=> $value): ?>
			<tr>
				<td><?= $value['id']; ?></td>
				<td><?= $value['name']; ?></td>
				<td><?= $value['code']; ?></td>
				<td><?= $value['added_at']; ?></td>
				<td>
					<a href="http://localhost/ci4/public/states/stateEdit?id=<?php echo $value['id']; ?>">Edit</a>
					<a href="http://localhost/ci4/public/states/stateAdd">ADD</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>