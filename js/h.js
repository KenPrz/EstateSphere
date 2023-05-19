// jabaskrip para sa ratings

//rating sa accuracy
$(document).ready(function() {
  $('.rating input').change(function() {
    var ratingValue = parseInt($(this).val());
    $('.rating input').prop('checked', false);
    $('.rating input').each(function() {
      var currentValue = parseInt($(this).val());
      if (currentValue <= ratingValue) {
        $(this).prop('checked', true);
      }
    });
  });
});

 $(document).ready(function() {
    $('.rating input').change(function() {
      var ratingValue = $(this).val();
      $('#ratingAccuracy').val(ratingValue);
    });
});

 //rating sa location
$(document).ready(function() {
  $('.rating2 input').change(function() {
    var ratingValue = parseInt($(this).val());
    $('.rating2 input').prop('checked', false);
    $('.rating2 input').each(function() {
      var currentValue = parseInt($(this).val());
      if (currentValue <= ratingValue) {
        $(this).prop('checked', true);
      }
    });
  });
});

 $(document).ready(function() {
    $('.rating2 input').change(function() {
      var ratingValue = $(this).val();
      $('#ratingLocation').val(ratingValue);
    });
});

//rating sa communication
$(document).ready(function() {
  $('.rating3 input').change(function() {
    var ratingValue = parseInt($(this).val());
    $('.rating3 input').prop('checked', false);
    $('.rating3 input').each(function() {
      var currentValue = parseInt($(this).val());
      if (currentValue <= ratingValue) {
        $(this).prop('checked', true);
      }
    });
  });
});

 $(document).ready(function() {
    $('.rating3 input').change(function() {
      var ratingValue = $(this).val();
      $('#ratingCommunication').val(ratingValue);
    });
});

//rating sa check in
$(document).ready(function() {
  $('.rating4 input').change(function() {
    var ratingValue = parseInt($(this).val());
    $('.rating4 input').prop('checked', false);
    $('.rating4 input').each(function() {
      var currentValue = parseInt($(this).val());
      if (currentValue <= ratingValue) {
        $(this).prop('checked', true);
      }
    });
  });
});

 $(document).ready(function() {
    $('.rating4 input').change(function() {
      var ratingValue = $(this).val();
      $('#ratingCheckIn').val(ratingValue);
    });
});

 //rating sa cleanliness
$(document).ready(function() {
  $('.rating5 input').change(function() {
    var ratingValue = parseInt($(this).val());
    $('.rating5 input').prop('checked', false);
    $('.rating5 input').each(function() {
      var currentValue = parseInt($(this).val());
      if (currentValue <= ratingValue) {
        $(this).prop('checked', true);
      }
    });
  });
});

 $(document).ready(function() {
    $('.rating5 input').change(function() {
      var ratingValue = $(this).val();
      $('#ratingCleanliness').val(ratingValue);
    });
});

//rating sa value
$(document).ready(function() {
  $('.rating6 input').change(function() {
    var ratingValue = parseInt($(this).val());
    $('.rating6 input').prop('checked', false);
    $('.rating6 input').each(function() {
      var currentValue = parseInt($(this).val());
      if (currentValue <= ratingValue) {
        $(this).prop('checked', true);
      }
    });
  });
});

 $(document).ready(function() {
    $('.rating6 input').change(function() {
      var ratingValue = $(this).val();
      $('#ratingValue').val(ratingValue);
    });
});

//for with who check box
//  $(document).ready(function() {
//   $('.with input').change(function() {
//     var ratingValue = parseInt($(this).val());
//     $('.with input').prop('checked', false);
//     $('.with input').each(function() {
//       var currentValue = parseInt($(this).val());
//       if (currentValue <= ratingValue) {
//         $(this).prop('checked', true);
//       }
//     });
//   });
// });
 
 $(document).ready(function() {
    $('.with input').change(function() {
      var ratingValue = $(this).val();
      $('#withwho').val(withwho);
    });
});

function toggleSelected(element) {
  element.classList.toggle("selected");
}