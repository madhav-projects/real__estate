<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Full-page background image */
        body {
            padding-top: 60px;
            font-family: Arial, sans-serif;
            background-image: url('images/bgagent.png'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Centered container with translucent background for readability */
        .container {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 8px;
            max-width: px;
            width: 100%;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
       

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            background-color: rgba(255, 255, 255, 0.8);
        }

     
            th {
              background-color: #3c2626;
              color: white;
               }

        h1.text-center.font-weight-bold {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .alert {
            color: red;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include('agents.header')
    <div class="container">
        <h1 class="text-center font-weight-bold">Task List</h1>
        <div id="alertMessage" class="alert" style="display: none;"></div>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Agent Name</th>
                    <th>Task</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody id="taskTableBody">
                <!-- Rows will be populated by AJAX -->
            </tbody>
        </table>
    </div>

    <script>
        function fetchTasks() {
            $.ajax({
                url: '{{ url('fetch_task') }}',
                method: 'GET',
                success: function(response) {
                    console.log(response);
                    const taskTableBody = $('#taskTableBody');
                    const alertMessage = $('#alertMessage');
                    taskTableBody.empty();
                    alertMessage.hide();

                    if (response.assigntask && response.assigntask.length > 0) {
                        response.assigntask.forEach(function(task) {
                            const row = `
                                <tr>
                                    <td>${task.id}</td>
                                    <td>${task.agent_name}</td>
                                    <td>${task.task}</td>
                                    <td>${task.due_date}</td>
                                </tr>
                            `;
                            taskTableBody.append(row);
                        });
                    } else {
                        alertMessage.text('No tasks found for this user.').show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching tasks:', error);
                    const alertMessage = $('#alertMessage');
                    alertMessage.text('Error fetching tasks. Please try again later.').show();
                }
            });
        }

        $(document).ready(function() {
            fetchTasks();
        });
    </script>
</body>
</html>
