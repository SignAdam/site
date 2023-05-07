
			
<!DOCTYPE html>
	<head>
	<title>Association FARassos</title>
		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
			<h1 align="center">Gestion Des utilisateurs</h1>
			<br />
			<div class="table-responsive"  >
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#memberModal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="utilisateur_data" class="table table-bordered table-striped" >
					<thead>
						<tr>
							<th >ID utilisateur</th>
							<th >nom</th>
							<th >prenom</th>
							<th >code postal</th>
							<th >ville</th>
							<th >pseudo</th>
							<th >password</th>
							<th >email</th>
							<th >date naissance</th>
							<th >role</th>
							<th >Éditer</th>
							<th >Effacer</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="memberModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="member_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Ajouter un utilisateur</h4>
				</div>
				<div class="modal-body">
				<label>Veuillez choisir votre nom</label>
				<input type="text" name="nom" id="nom" class="form-control">
				<br>
				<label>Veuillez choisir votre email</label>
				<input type="text" name="prenom" id="prenom" class="form-control">
				<br>
				<label>Tapez votre codepostal</label>
				<input type="text" name="codepostal" id="codepostal" class="form-control" />
				<br />
				<label>Tapez votre ville</label>
				<input type="text" name="ville" id="ville" class="form-control" />
				<br />
				<label>Tapez votre pseudo</label>
				<input type="text" name="pseudo" id="pseudo" class="form-control" />
				<br />
				<label>Tapez votre password</label>
				<input type="password" name="password" id="password" class="form-control" />
				<br />
				<label>Tapez votre email</label>
				<input type="email" name="email" id="email" class="form-control" />
				<br />
				<label>Tapez votre date naissance</label>
				<input type="date" name="datenaissance" id="datenaissance" class="form-control" />
				<br />
				<label>Tapez votre role</label>
				<input type="text" name="role" id="role" class="form-control" />
				<br />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

	$('#add_button').click(function(){
		$('#member_form')[0].reset();
		$('.modal-title').text("Ajouter un utilisateur");
		$('#action').val("Add");
		$('#operation').val("Add");
		
	});
	
var dataTable = $('#utilisateur_data').DataTable({
	    "processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"find.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],
		

		

	});



	$(document).on('submit', '#member_form', function(event){
		event.preventDefault();
		var nom = $('#nom').val();
		var prenom = $('#prenom').val();
		var codepostal = $('#codepostal').val();
		var ville = $('#ville').val();
		var pseudo = $('#pseudo').val();
		var password = $('#password').val();
		var email = $('#email').val();
		var datenaissance = $('#datenaissance').val();
		var role = $('#role').val();
		if(nom != '' && prenom != '' && codepostal != '' && ville != '' && pseudo != '' && password != '' && email != '' && datenaissance != '' && role != '')
		{
			$.ajax({
				url:"insert_update.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#member_form')[0].reset();
					$('#memberModal').modal('hide');
					dataTable.ajax.reload();
					window.location.href = './index.php';
				}
			});
		}
		else
		{
			alert("Obligatoire de remplir tout le formulaire");
		}
	});
	
	$(document).on('click', '.update', function(){
		var id = $(this).attr("id");
		$.ajax({
			url:"findOne.php",
			method:"POST",
			data:{id:id},
			dataType:"json",
			success:function(data)
			{
				$('#memberModal').modal('show');
				$('#nom').val(data.Nom);
				$('#prenom').val(data.Prenom);
				$('#codepostal').val(data.CodePostal);
				$('#ville').val(data.Ville);
				$('#pseudo').val(data.Pseudo);
				$('#password').val(data.Password);
				$('#email').val(data.Email);
				$('#datenaissance').val(data.DateNaissance);
				$('#role').val(data.role);
				$('.modal-title').text("Edit utilisateur");
				$('#id').val(id);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		if(confirm("Êtes-vous sûr de vouloir supprimer ce utilisateur ?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{id:id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
					window.location.href = './index.php';
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>