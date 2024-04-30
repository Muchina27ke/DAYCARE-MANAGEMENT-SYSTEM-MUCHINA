<?php
class groupController
{

	static public function ctrShowClasses($item, $value)
	{

		$table = "class";

		$answer = ClassModel::mdlShowClass($table, $item, $value);

		return $answer;
	}
	static public function ctrShowClassesSingle($item, $value)
	{

		$table = "class";

		$answer = ClassModel::mdlShowClass($table, $item, $value);

		return $answer;
	}
	public static function ctrAddClass()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$table = 'class';
			$data = array(
				'class' => $_POST["class"],
				'tutor' => $_POST["tutor"],
				'amount' => $_POST["amount"],
			);

			// You can perform validation and sanitation here

			// Assuming you have a function to add admission data to the database
			// Replace the following line with your actual implementation
			$result = classModel::mdlAddClass($table, $data);

			if ($result === 'ok') {
				// Success alert
				echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Activity added successfully!",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "class";
                            }
                        });
                    </script>';
			} else {
				// Error alert
				echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Failed to add activity. Please try again later!",
                        });
                    </script>';
			}
		}
	}
}
