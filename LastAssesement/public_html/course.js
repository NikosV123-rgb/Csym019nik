var leads = [];
function loadCourses()
{   $.getJSON('course.json', function (data) {
       $.each(data.courses, function(i, f) {
          var tblRow = "<tr>" + "<td>" + f.id + "</td>" +
           "<td>" + f.type + "</td>" + "<td>" + f.name + "</td>" + "<td>" + f.overview + "</td>" + "<td>" + f.highlights + "</td>" + "<td>" + f.course_details + "</td>"
 + "<td>" + f.entry_requirements + "</td>" + "<td>" + f.fees_and_funding + "</td>" + "<td>" + f.price_int + "</td>" + "<td>" + f.price_uk + "</td>" + "<td>" + f.price_us + "</td>" + "<td>" + f.student_perks + "</td>"
 + "<td>" + f.Integrated_Foundation_Year + "</td>" + "<td>" + f.image_url + "</td>";
           $(tblRow).appendTo(".leadstable tbody");
     });

   });
  };
