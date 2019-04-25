class UI {
	// Display audit on the table
	static displayAudits(audits) {
		let count = 1;

		audits.forEach(audit => {
			UI.addAuditToTable(count, audit);
			count++;
		});

		$('.table').DataTable({
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'excelHtml5',
					autoFilter: true,
					sheetName: 'Exported data'
				}
			]
		});
	}

	static displayMonths(months) {
		let count = 1;

		months.forEach(month => {
			console.log(month);
			UI.addMonthToReport(month);
			count++;
		});
	}

	static addMonthToReport(month) {
		const selects = document.querySelector('#input_months');
		const option = document.createElement('option');

		const val = document.createAttribute('value');
		val.attr = month;
		option.setAttributeNode(val);

		option.innerHTML = month;

		selects.appendChild(option);
	}

	static displayRating(ratings) {
		$('#vendor_label').html(ratings.vendor_name);
		$('#category_label').html(ratings.category_name);
		$('#po_number_label').html(ratings.po_number);
		$('#quality_of_report_label').html(ratings.quality_report_rating);
		$('#quality_of_installation_label').html(ratings.quality_installation_rating);
		$('#quality_of_post_label').html(ratings.quality_post_rating);
		$('#quality_of_life_label').html(ratings.quality_life_rating);
		$('#delivery_of_goods_label').html(ratings.delivery_goods_rating);
		$('#delivery_of_services_label').html(ratings.delivery_services_rating);
		$('#delivery_of_specifications_label').html(ratings.delivery_specification_rating);
		$('#innovation_label').html(ratings.innovation_rating);
		$('#expectations_label').html(ratings.expectations_rating);
		$('#competitive_label').html(ratings.competitive_rating);
		$('#communication_label').html(ratings.communication_rating);
		$('#responsiveness_label').html(ratings.responsiveness_rating);
		$('#prevention_label').html(ratings.prevention_rating);
		$('#createdBy_label').html(ratings.username);
	}

	static addAuditToTable(count, audit) {
		const tbody = document.querySelector('#audits_table');
		const row = document.createElement('tr');

		const attr = document.createAttribute('data-target');
		attr.value = audit.id;
		row.setAttributeNode(attr);

		const rowClass = document.createAttribute('onclick');
		rowClass.value = `view_audit(${audit.id})`;
		row.setAttributeNode(rowClass);

		let mdate = moment(audit.createdOn);

		row.innerHTML = `
			<td> ${count} </td>
			<th> ${audit.vendor_name} </th>
			<td> ${audit.category_name} </td>
			<td> ${audit.po_number} </td>
			<td> ${audit.username} </td>
			<td> ${mdate.format('MMMM Do YYYY')} </td>
		`;

		tbody.appendChild(row);
	}
}

function view_audit(id) {
	$.ajax({
		type: 'POST',
		url: '../backend/api/audits/getAuditById.php',
		data: {
			id: id
		},
		success: function(response) {
			const data = JSON.parse(response);
			UI.displayRating(data);
			return;
		},
		error: function() {
			console.log('500 Error');
		}
	});
	$('#viewModal').modal('show');
}

class Audit {
	static getAudits() {
		$.ajax({
			type: 'POST',
			url: '../backend/api/audits/getAudits.php',
			success: function(response) {
				const data = JSON.parse(response);
				UI.displayAudits(data);
				return;
			},
			error: function() {
				console.log('500 Error');
			}
		});
	}
}

// Instantiate ratings
function instantiateRatings() {
	$('#quality_report_rating').val('-');
	$('#input_report_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#quality_report_rating').val(index);
		}
	});

	$('#quality_installation_rating').val('-');
	$('#input_installation_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#quality_installation_rating').val(index);
		}
	});

	$('#quality_post_rating').val('-');
	$('#input_post_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#quality_post_rating').val(index);
		}
	});

	$('#input_life_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#quality_life_rating').val(index);
		}
	});

	$('#delivery_goods_rating').val('-');
	$('#input_d_goods_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#delivery_goods_rating').val(index);
		}
	});

	$('#delivery_services_rating').val('-');
	$('#input_d_services_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#delivery_services_rating').val(index);
		}
	});

	$('#delivery_specification_rating').val('-');
	$('#input_specification_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#delivery_specification_rating').val(index);
		}
	});

	$('#improvement_competitive_rating').val('-');
	$('#input_competitive_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#improvement_competitive_rating').val(index);
		}
	});

	$('#improvement_expectations_rating').val('-');
	$('#input_expectations_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#improvement_expectations_rating').val(index);
		}
	});

	$('#improvement_innovation_rating').val('-');
	$('#input_innovation_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#improvement_innovation_rating').val(index);
		}
	});

	$('#feedback_customer_rating').val('-');
	$('#input_customer_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#feedback_customer_rating').val(index);
		}
	});

	$('#feedback__expectations_rating').val('-');
	$('#input_prevention_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#feedback__expectations_rating').val(index);
		}
	});

	$('#feedback__response_rating').val('-');
	$('#input_response_rating').stars({
		stars: 5,
		value: 0,
		click: function(index) {
			$('#feedback__response_rating').val(index);
		}
	});
}

const rating = {
	hide: function() {
		$('#quality_ratings').hide();
		$('#delivery_ratings').hide();
		$('#continuous_improvement_ratings').hide();
		$('#responsiveness_ratings').hide();
	},

	show: function() {
		$('#quality_ratings').show();
		$('#delivery_ratings').show();
		$('#continuous_improvement_ratings').show();
		$('#responsiveness_ratings').show();
	}
};

// Hide the audits that doesn't depend on selected category of procurement
$('#input_category').on('change', function() {
	// instantiateRatings();
	let category = $(this)
		.find(':selected')
		.val();

	$('.qt').hide();

	if (category == 1) {
		$('.row .goods').show();
		rating.show();
	} else if (category == 2) {
		$('.row .services').show();
		rating.show();
	} else if (category == 3) {
		$('.row .turnkey').show();
		rating.show();
	} else if (category == 0) {
		rating.hide();
	}
});

// When document finishes loading...
$(document).ready(() => {
	instantiateRatings();
	rating.hide();

	if ($('#audits_card')[0] != null) {
		Audit.getAudits();
	}

	// Send data to backend
	$('#addAudit').on('submit', e => {
		e.preventDefault();

		const category = $('#input_category')
			.find(':selected')
			.val();

		if (category == parseInt(0)) {
			console.log('error ');
			Swal.fire({
				type: 'error',
				title: 'Invalid Input',
				text: 'Please select an option in the category'
			});
			return;
		}

		const data = $('#addAudit').serialize();

		$.ajax({
			type: 'POST',
			url: '../backend/api/audits/addAudit.php',
			data: data,

			success: function(response) {
				if (response == 1) {
					Swal.fire({
						type: 'success',
						title: 'Saved!',
						text: 'New Audit has been added',
						showCancelButton: false,
						timer: 1500,
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Okay!',
						onBeforeOpen: () => {
							Swal.showLoading();
						}
					}).then(result => {
						$(location).attr('href', 'audit_vendor.php');
					});
				} else {
					Swal.fire({
						type: 'error',
						title: 'Save Error',
						text: 'There was an error saving this audit.. Please try again later.'
					});
				}
			},
			error: function() {
				console.log('500 Error');
			}
		});
	});

	// // add bootstrap btn type to the dataTable Button
	// const dtBtn = document.querySelector('.buttons-excel');
	// const btnClass = document.createAttribute('class');
	// btnClass.value = 'btn btn-success';
	// dtBtn.setAttributeNode(btnClass);

	$('#pull_reports').submit(function(e) {
		$('#report_modal').modal('hide');
	});
});
