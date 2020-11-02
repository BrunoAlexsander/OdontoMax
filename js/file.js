/* Login */

$('form[name="login"]').submit(function (event) {
	event.preventDefault();
	$.ajax({
		url: "../php/Auth.php",
		type: "post",
		data: $(this).serialize(),
		dataType: "json",
		success: function (response) {
			if (response.msg == 0) {
				swal({title: "Informe todos os campos!", icon: "error"});
			} else if (response.msg == 1) {
				swal({title: "E-mail e senha incorretos!", icon: "error"});
			} else if (response.msg == 2) {
				swal({title: "Logado com sucesso!", icon: "success"}).then(function () {
					window.location.href = "../dashboard.php";
				});
			}
		}
	});
});

/* Paciente */

$('form[name="newPatient"]').submit(function(event) {
	event.preventDefault();
	$.ajax({
		url: "../php/Patient.php",
		type: "post",
		data: $(this).serialize() + "&action=0",
		dataType: "json",
		success: function (response) {
			if (response.msg == 0) {
				swal({title: "Informe todos os campos!", icon: "error"});
			} else if (response.msg == 1) {
				swal({title: "CPF já foi cadastrado!", icon: "error"});
			} else if (response.msg == 2) {
				swal({title: "Paciente cadastrado com sucesso!", icon: "success"}).then(function () {
					window.location.href = "../patients.php";
				});
			}
		}
	});
});

$('form[name="editPatient"]').submit(function (event) {
	event.preventDefault();
	$.ajax({
		url: "../php/Patient.php",
		type: "post",
		data: $(this).serialize() + "&action=1",
		dataType: "json",
		success: function (response) {
			if (response.msg == 0) {
				swal({title: "Informe todos os campos!", icon: "error"});
			} else if (response.msg == 1) {
				swal({title: "CPF já foi cadastrado!", icon: "error"});
			} else if (response.msg == 2) {
				swal({title: "Paciente editado com sucesso!", icon: "success"}).then(function () {
					window.location.href = "../patient.php?id=" + response.id;
				});
			}
		}
	});
});

$('.deletePacient').on('click', function (event) {
	event.preventDefault();
	var params = $(this).attr('href').split('&');
	var paramArray = {};
	for(var i=0; i<params.length; i++) {
		var param = params[i].split('=');
		paramArray[param[0]] = param[1];
	}
	swal({
			title: "Deseja realmente excluir?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: "../php/Patient.php",
					type: "post",
					data: {action: 2, patient_id: paramArray['id']},
					dataType: "json",
					success: function (response) {
						if (response.msg == 0 || response.msg == 1) {
							swal({title: "Não foi possivel remover", icon: "error"});
						} else if (response.msg == 2) {
							swal({title: "Paciente excluído com sucesso!", icon: "success"}).then(function () {
								window.location.href = "../patients.php";
							});
						}
					}
				});
			}
		});
});

/* Dentista */

$('form[name="newDentist"]').submit(function(event) {
	event.preventDefault();
	$.ajax({
		url: "../php/Dentist.php",
		type: "post",
		data: $(this).serialize() + "&action=0",
		dataType: "json",
		success: function (response) {
			if (response.msg == 0) {
				swal({title: "Informe todos os campos!", icon: "error"});
			} else if (response.msg == 1) {
				swal({title: "CPF já foi cadastrado!", icon: "error"});
			} else if (response.msg == 2) {
				swal({title: "Dentista cadastrado com sucesso!", icon: "success"}).then(function () {
					window.location.href = "../dentists.php";
				});
			}
		}
	});
});

$('form[name="editDentist"]').submit(function (event) {
	event.preventDefault();
	$.ajax({
		url: "../php/Dentist.php",
		type: "post",
		data: $(this).serialize() + "&action=1",
		dataType: "json",
		success: function (response) {
			if (response.msg == 0) {
				swal({title: "Informe todos os campos!", icon: "error"});
			} else if (response.msg == 1) {
				swal({title: "CPF já foi cadastrado!", icon: "error"});
			} else if (response.msg == 2) {
				swal({title: "Dentista editado com sucesso!", icon: "success"}).then(function () {
					window.location.href = "../dentist.php?id=" + response.id;
				});
			}
		}
	});
});

$('.deleteDentist').on('click', function (event) {
	event.preventDefault();
	var params = $(this).attr('href').split('&');
	var paramArray = {};
	for(var i=0; i<params.length; i++) {
		var param = params[i].split('=');
		paramArray[param[0]] = param[1];
	}
	swal({
			title: "Deseja realmente excluir?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: "../php/Dentist.php",
					type: "post",
					data: {action: 2, dentist_id: paramArray['id']},
					dataType: "json",
					success: function (response) {
						if (response.msg == 0 || response.msg == 1) {
							swal({title: "Não foi possivel remover!", icon: "error"});
						} else if (response.msg == 2) {
							swal({title: "Dentista excluído com sucesso!", icon: "success"}).then(function () {
								window.location.href = "../dentists.php";
							});
						}
					}
				});
			}
		});
});

/* Consulta */

$('form[name="newConsultation"]').submit(function(event) {
	event.preventDefault();
	$.ajax({
		url: "../php/Consultation.php",
		type: "post",
		data: $(this).serialize() + "&action=0",
		dataType: "json",
		success: function (response) {
			if (response.msg == 0) {
				swal({title: "Informe todos os campos!", icon: "error"});
			} else if (response.msg == 1) {
				swal({title: "Data, hora e dentista indisponíveis!", icon: "error"});
			} else if (response.msg == 2) {
				swal({title: "Consulta marcada com sucesso!", icon: "success"}).then(function () {
					window.location.href = "../consultations.php";
				});
			}
		}
	});
});

$('form[name="editConsultation"]').submit(function (event) {
	event.preventDefault();
	$.ajax({
		url: "../php/Consultation.php",
		type: "post",
		data: $(this).serialize() + "&action=1",
		dataType: "json",
		success: function (response) {
			if (response.msg == 0) {
				swal({title: "Informe todos os campos!", icon: "error"});
			} else if (response.msg == 1) {
				swal({title: "Data, hora e dentista indisponíveis!", icon: "error"});
			} else if (response.msg == 2) {
				swal({title: "Consulta remarcada com sucesso!", icon: "success"}).then(function () {
					window.location.href = "../consultation.php?id=" + response.id;
				});
			}
		}
	});
});

$('.deleteConsultation').on('click', function (event) {
	event.preventDefault();
	var params = $(this).attr('href').split('&');
	var paramArray = {};
	for(var i=0; i<params.length; i++) {
		var param = params[i].split('=');
		paramArray[param[0]] = param[1];
	}
	swal({
			title: "Deseja realmente excluir?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: "../php/Consultation.php",
					type: "post",
					data: {action: 2, consultation_id: paramArray['id']},
					dataType: "json",
					success: function (response) {
						if (response.msg == 0 || response.msg == 1) {
							swal({title: "Não foi possivel remover", icon: "error"});
						} else if (response.msg == 2) {
							swal({title: "Consulta removida com sucesso!", icon: "success"}).then(function () {
								window.location.href = "../consultations.php";
							});
						}
					}
				});
			}
		});
});

$('form[name="newProcedure"]').submit(function(event) {
	event.preventDefault();
	$.ajax({
		url: "../php/Procedure.php",
		type: "post",
		data: $(this).serialize() + "&action=0",
		dataType: "json",
		success: function (response) {
			if (response.msg == 0) {
				swal({title: "Informe o campo descrição!", icon: "error"});
			} else if (response.msg == 1) {
				swal({title: "Não foi possível adicionar!", icon: "error"});
			} else if (response.msg == 2) {
				swal({title: "Procedimento cadastrado!!", icon: "success"}).then(function () {
					window.location.href = "../procedures.php";
				});
			}
		}
	});
});

$('.deleteProcedure').on('click', function (event) {
	event.preventDefault();
	var params = $(this).attr('href').split('&');
	var paramArray = {};
	for(var i=0; i<params.length; i++) {
		var param = params[i].split('=');
		paramArray[param[0]] = param[1];
	}
	swal({
			title: "Deseja realmente excluir?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: "../php/Procedure.php",
					type: "post",
					data: {action: 2, procedure_id: paramArray['id']},
					dataType: "json",
					success: function (response) {
						if (response.msg == 0 || response.msg == 1) {
							swal({title: "Não foi possivel remover", icon: "error"});
						} else if (response.msg == 2) {
							swal({title: "Procedimento removido com sucesso!", icon: "success"}).then(function () {
								window.location.href = "../procedures.php";
							});
						}
					}
				});
			}
		});
});