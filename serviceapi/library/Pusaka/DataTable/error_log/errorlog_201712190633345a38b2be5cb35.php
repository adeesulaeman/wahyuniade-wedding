SELECT lr.RequestId AS RequestId,lr.EmployeeId AS EmployeeId,lr.RequestDays AS RequestDays,emp.FirstName AS FirstName,emp.LastName AS LastName,cat.Description AS Category,(
		    	SELECT quota.Quota FROM hr_data_leave_quota quota 
					WHERE 
		        		quota.EmployeeId 	= lr.EmployeeId AND
					  	quota.LeaveId 		= lr.LeaveId
		    ) AS QuotaLeft FROM hr_data_leave_request lr, hr_mstr_employee emp, hr_mstr_leave_category cat WHERE 1=1  AND (lr.EmployeeId=emp.EmployeeId AND cat.LeaveId=lr.LeaveId)    ORDER BY RequestId ASC LIMIT 0, 5