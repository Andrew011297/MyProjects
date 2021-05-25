
/**
 * Represents an Employee
 * All objects have a name and a staff number.
 * A name string of "No name" indicates no real name specified yet.
 * A staff number string of "Unallocated" indicates 
 * no staff number specified yet.
 * 
 * NOTE there is no error checking in ths class
 * 
 * @author Ian Bradley. Amended by Alan Maughan.
 * @version 2.0 
 */

public abstract class Employee
{
    private String name, staffNumber;
    
    // static variable used to generate a new staff number
    private static int staffNo = 10000;
    

    /**
     * Employee  Default Constructor
     * Sets name to be "No name"
     * Sets staff number to "Unallocated"
     *
     */
    public Employee( )
    {
        name = "No name";
        staffNumber = "Unallocated";
    }

    /**
     * Employee Constructor
     * name is not null 
     * will use staffNo to generate the 'next' staff number
     *
     * @param theName of the employee, may not be null
     * 
     */
    public Employee(String name)
    {
        this.name = name;
        staffNumber = "" + (++staffNo);
    }

    /**
     * gets the employees name
     *
     * @return name
     */
    public String getName( )
    {
        return name;
    }
    
    /**
     * sets the name of an employee
     * 
     * @param newName the employee's new name
     */
    public void setName (String newName)
    {
        name = newName;
    }

    /**
     *gets the employee's staff number
     *
     * @return the staff number
     */
    public String getStaffNumber( )
    {
        return staffNumber;
    }

    /**
     * generates a new staff number
     * the name may not be null
     */
    public void generateStaffNumber()
    {
        staffNumber = "" + (++staffNo);;
    }

    /**
     * the toString method
     * 
     * @return the employee data
     */
    
    public String toString( )
    {
        return name + " " + staffNumber;
    }

    /**
     * checks for equality
     * Two employees are equal if 
     *   if they are instances of Employyee or a subtype
     *   they have the same name
     *   and also the same staff number
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
        if ( !( other instanceof Employee) )
        {
           return false;
        }
        
        if ( this == other)
        {
            return true;
        }
        Employee otherEmployee = (Employee)other;
        
        return (name.equals(otherEmployee.name)
            && staffNumber.equals(otherEmployee.staffNumber));
    }  
    
    public abstract double getPay();
    
} // end Employee class

