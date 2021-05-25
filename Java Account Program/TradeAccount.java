
/**
 * Represents a person's trade account
 * To be used within Homework 3
 * 
 * @author Andrew Robson 
 * @version 13/03/2017
 */
public class TradeAccount extends Account
{
    private String accountName; //Name of the account
    private Address companyAddress; //The address of the company
    private String vatNumber; //The VAT number
    
    /**
     * Declaration for trade account without points
     * @param firstName the customer's first name
     * @param lastName the customer's last name
     * @param accountNumber the customer's account number
     * @param street the customer's street
     * @param town the customer's town
     * @param postcode the customer's postcode
     * @param accountName the account's name
     * @param cStreet the company's street
     * @param cTown the company's town
     * @param cPostCode the company's postcode
     * @param vatNumber the VAT number
     * @super this allows for additional usability held within the account class
     */
    public TradeAccount( String firstName, String lastName, 
    String accountNumber, String street, String town, String postcode, 
    String accountName, String cStreet, String cTown, String cPostCode, 
    String vatNumber)
    {
        super( firstName, lastName, accountNumber, street, town, postcode);
        companyAddress = new Address( cStreet, cTown, cPostCode);
        this.accountName = accountName;
        this.vatNumber = vatNumber;
    }
    
    /**
     * Declaration for trade account with points
     * @param firstName the customer's first name
     * @param lastName the customer's last name
     * @param accountNumber the customer's account number
     * @param street the customer's street
     * @param town the customer's town
     * @param postcode the customer's postcode
     * @param accountName the account's name
     * @param cStreet the company's street
     * @param cTown the company's town
     * @param cPostCode the company's postcode
     * @param vatNumber the VAT number
     * @param points the number of points the customer has
     * @super this allows for additional usability held within the account class
     */
    public TradeAccount( String firstName, String lastName, String accountNumber, 
    String street, String town, String postcode, String accountName, 
    String cStreet, String cTown, String cPostCode, String vatNumber, 
    int points)
    {
        super( firstName, lastName, accountNumber, points, street, town, postcode);
        companyAddress = new Address( cStreet, cTown, cPostCode);
        this.accountName = accountName;
        this.vatNumber = vatNumber;
    }
    
    /**
     * Returns the account name
     * @return the account name
     */
    public String getAccountName()
    {
        return accountName;
    }
    
    /**
     * Returns the company's address
     * @return the company's address
     */
    public String getCompanyAddress()
    {
        return super.getAddress();
    }
    
    /**
     * Returns the VAT number
     * @return the VAT number
     */
    public String getVatNumber()
    {
        return vatNumber;
    }
    
    /**
     * Prints out the tostring method below
     * 
     */
    public void print()
    {
        System.out.println(toString());
    }
    
    /**
     * Used to gather all of the relevant information and allow for a 
     * formatted output
     * @return the formatted output
     */
    public String toString()
    {
        return "Trade " + super.toString() + "\n" + "Account: " 
        + getAccountName() + ", " + getCompanyAddress() + "\n" 
        + "VAT number: " + vatNumber + "\n";
    }
}