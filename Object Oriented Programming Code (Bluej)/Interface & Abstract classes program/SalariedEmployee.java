/**
 * Represents an employee paid a salary
 * All objects have a name string, staff number, non-negative 
 * wage rate, and non-negative number of hours worked. A name string of 
 * "No name" indicates no real name specified yet. 
 * "Unallocated" indicates no staff number generated for this employee.
 * indicates no staff number specified yet.
 * 
 * Note: null values not allowed
 * Note no errorchecking in this vesion
 * 
 * @author Ian Bradley amended by Alan Maughan
 * @version 2.0
 */

public class SalariedEmployee extends Employee
{
    private double salary; //annual

    /**
     * Default Constructor
     * 
     * sets name to "No name"
     * sets staff number to "Unallocated"
     * sets salary to 0.0
     *
     */
    public SalariedEmployee( )
    {
        super( );
        salary = 0;
    }

    /**
     * Constructor
     * Neither the name nor the staff number is null;  the salary is nonnegative.
     * 
     * @param theName employee name     
     * @param theSalary the employees annual salary
     */
    public SalariedEmployee(String name, double theSalary)
    {
        super(name);
        salary = theSalary;
    }

    /**
     * gets the employee's salary
     *
     * @return The salary
     */
    public double getSalary( )
    {
        return salary;
    }

    /**
     *  calculates the monthly salary
     *  
     *  @returns the monthly salary
     */
    public double getPay( )
    {
        return salary/12;
    }

    /**
     * sets the salary
     * must be nonnegative.
     * 
     * @param newSalary the new salary
     */
    public void setSalary(double newSalary)
    {
        salary = newSalary;
    }

    /**
     * the toString method
     * returns a string in the format
     *   name staffnumber salary per year
     *
     * @return the string representing the employee data.
     */
    
    public String toString( )
    {
       return (super.toString( ) + "\n" + salary 
                                  + " per year");
    }
    
    /**
     * checks for equality
     * Two  hourly employees are equal if 
     *   they are both salaried employees
     *   and they have the same name
     *   and also the same staffnumber
     *   and also the same salary
     *
     * @param other the employee object for comparison
     * @return true if equal otherwise false
     */
    public boolean equals(Object other)
    {
        if ( other == null)
        {
            return false;    
        }
        
        if (!(other instanceof SalariedEmployee))
        {
            return false;
        }
        
        if ( this == other)
        {
            return true;
        }
        
        SalariedEmployee otherEmployee = (SalariedEmployee)other;
        
        return (getName( ).equals(otherEmployee.getName( )) 
            && getStaffNumber( ).equals(otherEmployee.getStaffNumber( ))
            && salary == otherEmployee.salary);
    }
}
