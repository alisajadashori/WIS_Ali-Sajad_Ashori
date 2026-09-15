<?php

include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST["full_name"]);
    $father_name = trim($_POST["father_name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $program = trim($_POST["program"]);

    if (
        empty($full_name) ||
        empty($father_name) ||
        empty($email) ||
        empty($phone) ||
        empty($program)
    ) {

        $error = "Please fill in all fields.";

    }
    
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";

    }
    else {

        $stmt = $conn->prepare(
            "INSERT INTO applications
            (full_name, father_name, email, phone, program)
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "sssss",
            $full_name,
            $father_name,
            $email,
            $phone,
            $program
        );

       
        if ($stmt->execute()) {

            header("Location: admission.php");
            exit();
        } else {
             $error = "Application could not be saved.";

        }

        $stmt->close();
    }
}

$result = $conn->query(
    "SELECT * FROM applications ORDER BY id DESC"
);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Admission Application</title>

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

</head>

<body>

    <h1>Student Admission Application</h1>
<div class="container mt-5">
    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2 class="text-center">
                Student Admission Application
            </h2>

        </div>


        <div class="card-body">


            <?php if (isset($error)): ?>

                <div class="alert alert-danger">

                    <?php echo htmlspecialchars($error); ?>

                </div>

            <?php endif; ?>


            <form method="post">


                <!-- Full Name -->

                <div class="mb-3">

                    <label class="form-label">
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="full_name"
                        class="form-control"
                        required
                    >

                </div>


                <!-- Father's Name -->

                <div class="mb-3">

                    <label class="form-label">
                        Father's Name
                    </label>

                    <input
                        type="text"
                        name="father_name"
                        class="form-control"
                        required
                    >

                </div>


                <!-- Email -->

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        required
                    >

                </div>


                <!-- Phone -->

                <div class="mb-3">

                    <label class="form-label">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        required
                    >

                </div>


                <!-- Program -->

                <div class="mb-3">

                    <label class="form-label">
                        Program
                    </label>

                    <select
                        name="program"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Select Program
                        </option>

                        <option value="Information Systems">
                            Information Systems
                        </option>

                        <option value="Software Engineering">
                            Software Engineering
                        </option>

                        <option value="Computer Science">
                            Computer Science
                        </option>

                    </select>

                </div>


                <!-- Button -->

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Submit Application
                </button>


            </form>


        </div>

    </div>

     <h2 class="mt-5">
        Submitted Applications
    </h2>


    <div class="table-responsive">

        <table class="table table-bordered table-striped">


            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Father's Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Program</th>

                </tr>

            </thead>


            <tbody>


                <?php while ($row = $result->fetch_assoc()): ?>

                    <tr>

                        <td>
                            <?php echo $row["id"]; ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars($row["full_name"]);
                            ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars($row["father_name"]);
                            ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars($row["email"]);
                            ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars($row["phone"]);
                            ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars($row["program"]);
                            ?>
                        </td>

                    </tr>

                <?php endwhile; ?>


            </tbody>

        </table>

    </div>


</div>

</body>
</html>

        