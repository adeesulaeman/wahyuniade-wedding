SELECT COUNT(*) AS COUNT FROM employee WHERE 1=1  AND (  UPPER(Code)  LIKE  UPPER('%a%')  OR  UPPER(Name)  LIKE  UPPER('%a%')  OR  UPPER(Salary)  LIKE  UPPER('%a%')  )  