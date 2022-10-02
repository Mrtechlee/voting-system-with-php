			$stmt->execute(array($phone_number));

			// If not, save their vote
			if ($stmt->fetchColumn() == 0)
			{
				// Save voter
				$stmt = $this->db->prepare('INSERT INTO voters (phone_number, voted_for) VALUES (?, ?)');
				$stmt->execute(array($phone_number, $voted_for));

				// Update vote count
				$stmt = $this->db->prepare('UPDATE teams SET votes = votes + 1 WHERE id=?');
				$stmt->execute(array($voted_for));

				return 'Thank you, your vote has been recorded';
			}
			else {
				return 'Sorry, you can only vote once.';
			}
		}
	}
?>
