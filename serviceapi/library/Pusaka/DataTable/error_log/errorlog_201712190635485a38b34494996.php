SELECT lr.RequestId AS RequestId,lr.EmployeeId AS EmployeeId,lr.RequestDays AS RequestDays,emp.FirstName AS FirstName,emp.LastName AS LastName,cat.Description AS Category,(
		    	SELECT quota.Quota FROM hr_data_leave_quota quota 
					WHERE 
		        		quota.EmployeeId 	= lr.EmployeeId AND
					  	quota.LeaveId 		= lr.LeaveId
		    ) AS QuotaLeft FROM 
			hr_data_leave_request lr 
				LEFT JOIN 
					hr_mstr_employee emp ON lr.EmployeeId=emp.EmployeeId, 
				LEFT JOIN 
					hr_mstr_leave_category cat ON cat.Id=lr.LeaveId
		 WHERE 1=1    ORDER BY RequestId ASC LIMIT 0, 5