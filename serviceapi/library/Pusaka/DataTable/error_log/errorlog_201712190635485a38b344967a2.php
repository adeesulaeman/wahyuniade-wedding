SELECT COUNT(*) AS COUNT FROM 
			hr_data_leave_request lr 
				LEFT JOIN 
					hr_mstr_employee emp ON lr.EmployeeId=emp.EmployeeId, 
				LEFT JOIN 
					hr_mstr_leave_category cat ON cat.Id=lr.LeaveId
		 WHERE 1=1   