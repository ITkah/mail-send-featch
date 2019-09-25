var form = document.getElementById("form");

function submitForm() {

    let formName = document.forms.testForm;
    let data = new FormData(formName);

    fetch('mail.php', {
        method: 'POST',
        body: data
    }).then(function (response) {
        return response.text();
    }).then(function(data) {
        console.log("data");
    }).catch(function(err) {
        console.log("error");
    });
}

form.addEventListener('submit', function(e){
    e.preventDefault();
    submitForm();
});

