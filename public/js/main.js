'use strict';

function showGeneralModal (title, content) {
	hideErrorModal();
	hideSuccessModal();

	$('#generalModal').find('.modal-title').text(title);
	$('#generalModal').find('.modal-body p').text(content);

	$('#generalModal').modal('show');
}

function hideGeneralModal () {
	$('#generalModal').modal('hide');
}

function showErrorModal (content) {
	hideGeneralModal();
	hideSuccessModal();

	$('#errorModal').find('.modal-body p').text(content);

	$('#errorModal').modal('show');
}

function hideErrorModal () {
	$('#errorModal').modal('hide');
}

function showSuccessModal (content) {
	hideGeneralModal();
	hideErrorModal();

	$('#successModal').find('.modal-body p').text(content);

	$('#successModal').modal('show');
}

function hideSuccessModal () {
	$('#successModal').modal('hide');
}
