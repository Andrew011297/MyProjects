
/**
 * Represents a person's account
 * To be used within Homework 3
 * 
 * @author Andrew Robson
 * @version 13/03/2017
 */
public abstract class Account
{
    private String accountNumber; //Customer's account number
    private Address address; //Customer's address
    private Name name; //Customer's name
    private int pointsHeld; //Number of points held
    
    /**
     * Declaration for the account class with points
     * @param fName the customer's first name
     * @param lName the customer's last name
     * @param acctNumber the customer's account number
     * @param points the number of points 
     * @param street the name of the street
     * @param town the name of the town
     * @param postcode the customer's postcode
     */
    public Account( String fName, String lName, String acctNumber, 
    int points, String street, String town, String postcode)
    {
        name = new Name(fName, lName);
        accountNumber = acctNumber;
        pointsHeld = points;
        address = new Address(street, town, postcode);
    }
    
    /**
     * Declaration for the account class without points
     * @param fName the customer's first name
     * @param lName the customer's last name
     * @param accNumber the account number
     * @param street the name of the street
     * @param town the name of the town
     * @param the name of the postcode
     */
    public Account(String fName, String lName, String accNumber, 
    String street, String town, String postcode)
    {
        name = new Name(fName, lName);
        accountNumber = accNumber;
        address = new Address(street, town, postcode);
    }
    
    /**
     * Method used to add points to the point total
     * @param points the number of points to be added to pointsHeld
     */
    public void addPoints(int points)
    {
        pointsHeld = pointsHeld + points;
    }
    
    /**
     * equals method to compare the address field
     * @return true or false depending upon address entered
     * @param Object o an object declared for use in the equals method
     */
    public boolean equals(Object o)
    {
        if ( o == null)  
        {
            return false;      
        }
        
        if ( this == o)
        {
            return true;   
        }
         
        Address address = (Address) o;        
         
        if (address.toString().equals( toString()))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Method used to return the account number
     * @return the account number
     */
    public String getAccountNumber()
    {
        return accountNumber;
    }
    
    /**
     * Method used to return the customer's address
     * @return the customer's address
     */
    public String getAddress()
    {
        return address.toString();
    }
    
    /**
     * Method used to return the customer's first name
     * @return the customer's first name
     */
    public String getFirstName()
    {
        return name.getFirst();
    }
    
    /**
     * Method used to return the customer's last name
     * @return the customer's last name
     */
    public String getLastName()
    {
        return name.getLast();
    }
    
    /**
     * Method used to return the number of points held
     * @return the number of points
     */
    public int getNoOfPoints()
    {
        return pointsHeld;
    }
    
    /**
     * Prints the toString method below
     */
    public void printAccountDetails()
    {
        System.out.println(toString());
    }
    
    /**
     * Method used to remove points from the customer's point total
     * @param points the number of points to be removed
     */
    public void removePoints(int points)
    {
        pointsHeld = pointsHeld - points;
    }
    
    /**
     * Method used to set the customer's address
     * @param street the customer's street
     * @param town the customer's town
     * @param postcode the customer's postcode
     */
    public void setAddress(String street, String town, String postcode)
    {
        address.setFullAddress(street, town, postcode);
    }
    
    /**
     * Method used to set the customer's first name
     * @param fName the customer's first name
     */
    public void setFirstName(String fName)
    {
        name.setFirst(fName);
    }
    
    /**
     * Method used to set the customer's last name
     * @param lName the customer's last name
     */
    public void setLastName(String lName)
    {
        name.setLast(lName);
    }
    
    /**
     * Used to gather all of the relevant information and allow for a 
     * formatted output
     * @return the formatted output
     */
    public String toString()
    {
        return "Account: " + accountNumber + " " + name.toString() + 
        "\n" + address.toString() + "\n" + "Points Held: " + pointsHeld;
    }
}
