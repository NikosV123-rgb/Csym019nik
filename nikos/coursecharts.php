<!DOCTYPE html>
<html>
<head>
    <title>Course Charts Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid w-75"> 
        <div class="row">
            <div class="col-md-12 my-5 d-flex justify-content-center">
                <h1>Chosen Data</h1>
            </div>
            <div class="col-md-12">
                <canvas id="graph"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            showGraph();
        });

        const showGraph = () => {
            {
                $.post("graphdata.php",function (data)
                {
                    console.log(data);
                    var id = [];
                    var title = [];
                    var overview = [];
                    var highlights = [];
                    var course_details = [];
                    var entry_requirements = [];
                    var fees_and_funding = [];
                    var faqs = [];

                    for (var i in data) {
                        id.push(data[i].id);
                        title.push(data[i].title);
                        overview.push(data[i].overview);
                        highlights.push(data[i].highlights);
                        course_details.push(data[i].course_details);
                        entry_requirements.push(data[i].entry_requirements);
                        fees_and_funding.push(data[i].fees_and_funding);
                        faqs.push(data[i].faqs);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Course Marks',
                                backgroundColor: 'green',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graph");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
    </script>
</body>
</html>

