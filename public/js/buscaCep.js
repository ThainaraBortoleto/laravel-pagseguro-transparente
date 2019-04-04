function limpa_formulário_cep() {
	$("#shippingAddressStreet").val("");
	$("#shippingAddressDistrict").val("");
	$("#shippingAddressCity").val("");
	$("#shippingAddressState").val("");
	$("#ibge").val("")
}
function limpa_formulário_other_cep() {
	$("#billingAddressStreet").val("");
	$("#billingAddressDistrict").val("");
	$("#billingAddressCity").val("");
	$("#billingAddressState").val("");
}
$(".cep").blur(function() {
	var cep = $(this).val().replace(/\D/g, '');
	if (cep != "") {
		var validacep = /^[0-9]{8}$/;
		if (validacep.test(cep)) {
			$("div#formDados :input").each(function(){
				var input = $(this);
				if(input.val() !== ''){
					var label=$(input).prop("labels"),
						text = $(label).text();
					$(label).addClass('active');
				}
			});
			$("#shippingAddressStreet").val("...");
			$("#shippingAddressDistrict").val("...");
			$("#shippingAddressCity").val("...");
			$("#shippingAddressState").val("...");
			$("#ibge").val("...");
			$.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
				if (!("erro" in dados)) {
					$("#shippingAddressStreet").val(dados.logradouro);
					$("#shippingAddressDistrict").val(dados.bairro);
					$("#shippingAddressCity").val(dados.localidade);
					$("#shippingAddressState").val(dados.uf);
					$("#ibge").val(dados.ibge);
					M.updateTextFields();
					$(".cep").addClass('valid');
					$(".cep").removeClass('invalid');
				} else {
					limpa_formulário_cep();
					$(".cep").val("");
					$(".cep").addClass('invalid');
					swal({
						title: "Atenção",
						text: "CEP não encontrado",
						type: "warning",
						button: "OK",
					})
				}
			})
		} else {
			limpa_formulário_cep();
			$(".cep").val("");
			$(".cep").addClass('invalid');
			swal({
				title: "Atenção...",
				text: "Formato de CEP inválido!",
				type: "warning",
				button: "OK",
			})
		}
	} else {
		limpa_formulário_cep()
		$(".cep").val("");

	}
});

$(".cepOther").blur(function() {
	var cep = $(this).val().replace(/\D/g, '');
	if (cep != "") {
		var validacep = /^[0-9]{8}$/;
		if (validacep.test(cep)) {
			$("#billingAddressStreet").val("...");
			$("#billingAddressDistrict").val("...");
			$("#billingAddressCity").val("...");
			$("#billingAddressState").val("...");
			$.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
				if (!("erro" in dados)) {
					$("#billingAddressStreet").val(dados.logradouro);
					$("#billingAddressStreet").addClass('valid');
					$("#billingAddressDistrict").val(dados.bairro);
					$("#billingAddressDistrict").addClass("valid");
					$("#billingAddressCity").val(dados.localidade);
					$("#billingAddressCity").addClass("valid");
					$("#billingAddressState").val(dados.uf);
					$("#billingAddressState").addClass("valid");
					$(".cepOther").addClass('valid');
					$(".cepOther").removeClass('invalid');
				} else {
					limpa_formulário_other_cep();
					$(".cepOther").val("");
					$(".cepOther").addClass('invalid');
					swal({
						title: "Atenção",
						text: "CEP não encontrado",
						type: "warning",
						button: "OK",
					})
				}
			})
		} else {
			limpa_formulário_other_cep();
			$(".cepOther").val("");
			$(".cepOther").addClass('invalid');
			swal({
				title: "Atenção...",
				text: "Formato de CEP inválido!",
				type: "warning",
				button: "OK",
			})
		}
	} else {
		limpa_formulário_other_cep();
		$(".cepOther").val("");

	}
});
