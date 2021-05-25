
/**
* Represents an employee paid  by the hour
* All objects have a name string, staff number, nonnegative
* wage rate, and nonnegative number of hours worked. A name string of
* "No name" indicates no real name specified yet. 
* "Unallocated" indicates no staff number generated.
*
* Note: null values not allowed
* Note no errorchecking in this vesion
*
* @author Ian Bradley. Amended bu Alan Maughan
* @version 2.0
* 
*/
public class HourlyEmployee extends Employee
{
    private double wageRate;
    private double hours; //for the month

    /**
    * Default Constructor
    *
    * sets name to "No name"
    * sets staff number to "Unallocated"
    * sets wage and hours to 0.0
    *
    */
    public HourlyEmployee()
    {
        super();
        wageRate = 0;
        hours = 0;
    }

    /**
     * Constructor
     * Neither theName nor the staff number is null;  theWageRate and theHours are nonnegative.
     *
     * @param theName employee name
     * @param theWageRate hourly wage rate
     * @param theHours number of hours worked
     */
    public HourlyEmployee(String name, double theWageRate, double theHours)
    {
        super(name);
        wageRate = theWageRate;
        hours = theHours;

    }

    /**
     * gets the employee's wage rate
     *
     * @return The wage rate
     */
    public double getRate()
    {
        return wageRate;
    }

    /**
     * gets the hours the employee has worked
     *
     * @return the hours worked
     */
    public double getHours()
    {
        return hours;
    }

    /**
     * calculates the pay due to an employee for a month
     * pay = wage * hours
     *
     * @returns the pay earned.
     */
    public double getPay()
    {
        return wageRate * hours;
    }

    /**
     * sets the hours worked
     * must be  nonnegative.
     *
     * @param hoursWorked hours the employee has worked
     */
    public void setHours(double hoursWorked)
    {
        hours = hoursWorked;
    }

    /**
     * sets the wage rate
     * must be  nonnegative.
     *
     * @param newWageRate the new wage rate
     */
    public void setRate(double newWageRate)
    {
        wageRate = newWageRate;
    }

    /**
     * the toString method
     * returns a string in the format
     * name, staff number, hourly wage rate "per hour for" hours "hours"
     *
     * @return the string representing the employee data.
     */
    
    public String toString()
    {
        
        return(super.toString() + "\n" + wageRate 
                         + " per hour for " 
                         + hours + " hours");
    }
    

    /**
     * checks for equality
     * Two  hourly employees are equal if
     * they are bith hourly paid emloyees
     * and also have the same name
     * and also the same staff number
     * and also the same wage rate
     * and also the same number of hours
     *
     * @param other the employee object for comparison
     * @return true if equal otherwise false
     */
    public boolean equals(Object other)
    {
        if(other == null)
        {
            return false;
        }
        
        if(!(other instanceof HourlyEmployee))
        {
            return false;
        }
        
        if(this == other)
        {
            return true;
        }
        
        HourlyEmployee otherEmployee =(HourlyEmployee) other;
        
        return(getName().equals(otherEmployee.getName()) 
          && getStaffNumber().equals(otherEmployee.getStaffNumber()) 
            && wageRate == otherEmployee.wageRate 
              && hours == otherEmployee.hours);
    }
}
