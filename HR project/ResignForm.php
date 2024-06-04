<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resignation Form</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    width: 400px;
    text-align: center;
}

h1 {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="password"],
input[type="tel"],
input[type="date"],
select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    box-sizing: border-box;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

button {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    font-size: 1em;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
}

button[type="reset"] {
    background-color: #f44336;
    color: white;
}

button[type="button"] {
    background-color: #555;
    color: white;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Resignation Form</h1>
        <form action="resignation.php" method="post">
            <div class="form-group">
                <label for="employeeId">Employee ID:</label>
                <input type="text" id="employeeId" name="employeeId" required />
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required />
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required />
            </div>
            <div class="form-group">
                <label for="joiningDate">Joining Date:</label>
                <input type="date" id="joiningDate" name="joiningDate" required />
            </div>
            <div class="form-group">
                <label for="leavingDate">Leaving Date:</label>
                <input type="date" id="leavingDate" name="leavingDate" required />
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <select id="department" name="department" required>
                    <option value="">--Select Department--</option>
                    <option value="administration">Administration</option>
                    <option value="finance_hr_admin">Finance, HR, & Administration</option>
                    <option value="research">Research</option>
                    <option value="it">Information Technology</option>
                    <option value="support">Support</option>
                    <option value="network_engineering">Network Engineering</option>
                    <option value="sales_marketing">Sales and Marketing</option>
                    <option value="helpdesk">Helpdesk</option>
                    <option value="project_management">Project Management</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
                <button type="button" onclick="window.location.href='';">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>
