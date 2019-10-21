    'use strict';

function sortTable(n) {
        let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("usersTable");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Get the two elements you want to compare,
                one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /* Check if the two rows should switch place,
                based on the direction, asc or desc: */
                if (dir === "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir === "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                // Each time a switch is done, increase this count by 1:
                switchcount ++;
            } else {
                /* If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again. */
                if (switchcount === 0 && dir === "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }// sorting script was taken from bootstrap website

$(document).ready(function () {




    $('#regForm').on('submit', function (e) {

        e.preventDefault();

        let isDataCorrect = true;

        let name       = $('#name').val();
        let email      = $('#email').val();
        let password   = $('#password').val();
        let password_2 = $('#password_2').val();

        let namePattern     = /^[a-zA-Zа-яА-Я ]{2,30}$/;
        let emailPattern    = /^([a-z0-9]{3,}.?){1,3}@([a-z]{2,8}.){1,3}.[a-z]{2,8}$/i;
        let passwordPattern = /^(?=.*\d)(?=.[A-Za-z])[0-9A-Za-z]{6,}$/;


        if(!namePattern.test(name)){
            isDataCorrect = false;
            $('.name-error').css('display', 'block');
        }//if name

        if(!emailPattern.test(email)){
            isDataCorrect = false;
            $('.email-error').css('display','block');
        }//if email

        if(!passwordPattern.test(password)){
            isDataCorrect = false;
            $('.password-error').css('display','block');
        }else if(password !== password_2){
            isDataCorrect = false;
            $('.password_2-error').css('display','block');
        }

        if(isDataCorrect){

            let dataObj = {
                'name': name,
                'email': email,
                'password': password
            };

            $.ajax({
                'url': 'reg.php',
                'method': 'POST',
                'dataType': 'json',
                'data': {'data' : dataObj},
                'success': function (data) {

                    console.log(data);

                    if(data.code === 200){

                        $('#success-panel').text(`User ${data.data} registered successfully`);

                        $('#success-panel').show(()=>{
                            setTimeout(function () {
                                $('#success-panel').hide();
                            },3000);

                            window.location = '/';
                        });

                    }//register success

                    if(data.code === 505){

                        $('#error-panel').text('This email already registered!');

                        $('#error-panel').show(()=>{
                            setTimeout(function () {
                                $('#error-panel').hide();
                                $('.error').hide();
                            },3000);
                        });

                    }//if user already registered

                }//success ajax
            });

        }//if form data is correct


    });

    $('#loginForm').on('submit', function(e){

        e.preventDefault();

        let email    = $('#email').val();
        let password = $('#password').val();

        $.ajax({
            'url': '/login.php',
            'method': 'POST',
            'dataType': 'json',
            'data': {'email': email, 'password': password},
            'success': function (data) {

                if(data.code === 200){

                    console.log('code 200');
                    window.location = '/users.php';

                }//if

                if(data.code === 505){
                    console.log('code 505');
                    $('#error-panel').text('You have not registered yet!');

                    $('#error-panel').show(()=>{
                        setTimeout(function () {
                            $('#error-panel').hide();
                        },3000);
                    });

                }//if user already registered



            }

        });


    });

    $('#sortByName').on('click', function (e) {

        sortTable(1);

    });

    $('#sortByEmail').on('click', function (e) {

        sortTable(2);

    });


});