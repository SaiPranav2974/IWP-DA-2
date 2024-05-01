<?php
// Function to insert record
function insertRecord($conn, $table, $patient_id, $date_vaccinated)
{
    $sql = "INSERT INTO $table (patient_id, date_vaccinated) VALUES ('$patient_id', '$date_vaccinated')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to delete record
function deleteRecord($conn, $table, $patient_id)
{
    $sql = "DELETE FROM $table WHERE patient_id='$patient_id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to display count in a week in descending order
function displayCountInWeek($conn, $table)
{
    $sql = "SELECT COUNT(patient_id) as count, WEEK(date_vaccinated) as week FROM $table GROUP BY WEEK(date_vaccinated) ORDER BY week DESC";
    $result = $conn->query($sql);
    $counts = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $counts[$row["week"]] = $row["count"];
        }
    }
    return $counts;
}

// Function to administer vaccine
function administerVaccine($conn, $patient_id, $date_vaccinated)
{
    $covaxin_capacity = 7; // Maximum capacity for Covaxin per day
    $covishield_capacity = 10; // Maximum capacity for Covishield per day

    // Check if Covaxin capacity is reached for the day
    $sql = "SELECT COUNT(*) as count FROM covaxin WHERE date_vaccinated='$date_vaccinated'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $covaxin_count = $row['count'];

    if ($covaxin_count < $covaxin_capacity) {
        if (insertRecord($conn, 'covaxin', $patient_id, $date_vaccinated)) {
            return "Vaccine administered: Covaxin";
        } else {
            return "Error administering vaccine";
        }
    } else {
        // Check if Covishield capacity is reached for the day
        $sql = "SELECT COUNT(*) as count FROM covishield WHERE date_vaccinated='$date_vaccinated'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $covishield_count = $row['count'];

        if ($covishield_count < $covishield_capacity) {
            if (insertRecord($conn, 'covishield', $patient_id, $date_vaccinated)) {
                return "Vaccine administered: Covishield";
            } else {
                return "Error administering vaccine";
            }
        } else {
            return "No vaccine available for today.";
        }
    }
}
?>
