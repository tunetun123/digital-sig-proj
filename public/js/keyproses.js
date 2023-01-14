function angkaPrima (num) {
    let x= 0;
    for(let i = 2; i<= Math.floor(num/2); i++) {
      x++
      if (num%i === 0) {
        return false
      } 
    }
    return true
}

function gcd (a,b) { 
    let r;
    let temp;

    if (a < b) {
        temp = a;
        a = b;
        b = temp;  
    }

    while (b != 0) {
        r = a % b;
        a = b;
        b = r;
    }

    return a;
}

function hitung_d (e,totient) {
    let k, h, d;

    k = 1;

    while(true) {
        d = k * e;
        h = d % totient;

        if (h == 1) {
            return k;
        } else {
            k++;
        }
    }
}

$(document).ready(function(){
    let totient;
    $("#nilaiq").focusout(function() {
        let p = $("#nilaip").val();
        let q = $("#nilaiq").val();

        if (p == q) {
            alert('Nilai p dan q tidak boleh sama');
            $("#nilaip").val("");
            $("#nilaiq").val("");
            $("#nilain").val("");
            $("#nilaitotient").val("");
        } 
        else {
            if(angkaPrima(p) && angkaPrima(q) == true) {
                let n = parseInt(p) * parseInt(q);
                $("#nilain").val(n);

                totient = (parseInt(p) - 1) * (parseInt(q) - 1);
                $("#nilaitotient").val(totient);
            } else {
                alert('Nilai p atau q bukan bilangan prima');
                $("#nilaip").val("");
                $("#nilaiq").val("");
                $("#nilain").val("");
                $("#nilaitotient").val("");
            }
        } 
    })

    $("#euclidean").click(function () { 
        let e = $("#kuncipublik").val();
        e = parseInt(e);
        let test = gcd(e, totient);

        if(test == 1) {
            // proses kunci privat
            let d = hitung_d(e, totient);
            $("#kunciprivat").val(d);
        } else {
            alert("kunci publik e tidak relatif prima terhadap totient n. coba lagi!");
            $("#kuncipublik").val("");
            $("#kunciprivat").val("");
        }
        
    });
})


// $(document).ready(function() {
//     $("#nilaip, #nilaiq").validate({
//       rules: {
//         nilaip : {
//           required: true,
//           number : true,
//           minlength: 3
//         },
//         age: {
//           required: true,
//           number: true,
//           min: 18
//         },
//         email: {
//           required: true,
//           email: true
//         },
//         weight: {
//           required: {
//             depends: function(elem) {
//               return $("#age").val() > 50
//             }
//           },
//           number: true,
//           min: 0
//         }
//       },
//       messages : {
//         name: {
//           minlength: "Name should be at least 3 characters"
//         },
//         age: {
//           required: "Please enter your age",
//           number: "Please enter your age as a numerical value",
//           min: "You must be at least 18 years old"
//         },
//         email: {
//           email: "The email should be in the format: abc@domain.tld"
//         },
//         weight: {
//           required: "People with age over 50 have to enter their weight",
//           number: "Please enter your weight as a numerical value"
//         }
//       }
//     });
//   });