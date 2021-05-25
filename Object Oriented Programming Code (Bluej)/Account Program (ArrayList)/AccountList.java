/**
 * Import statement, allowing for the use of the Array list
 * @import Imports the selected library
 */
import java.util.ArrayList;
/**
 * Account List for homework 2
 * 
 * @author Andrew Robson W16011147
 * @version 27/02/2017
 */
public class AccountList
{
    /**
     * Declaring the array list
     * @private Declares the variable as being private
     */
    private ArrayList<Account> accounts;
    
    /**
     * declaring accounts variable
     * @new Creates a new instance of the array list
     */
    public AccountList()
    {
        accounts = new ArrayList<Account>();
    }
    
    /**
     * Adds an account to the array list
     * @param account the account object which will be added
     */
    public void addAccount(Account account)
    {
        accounts.add(account);
    }
    
    /**
     * Provides the specified account 
     * @param accountEntry The number that the account was allocated when created, 
     * used to retuen the specified account
     * @System.out.println Prints the specified text/variables to the system
     */
    public void getAccount(int accountEntry)
    {
        if (accountEntry < 0)
        {
            System.out.println("Negative entry:" + accountEntry);
        }
        else if (accountEntry < getNumberOfAccounts())
        {
            Account account = accounts.get(accountEntry);
            System.out.println(account.getFirstName() + " " + account.getLastName() + "\n" +
             "Account Number: " + account.getAccountNumber() + "\nNumber of points: " +
              account.getNoOfPoints()
            + "\nAccount number: " + account.getAccountNumber() + "\n" + account.getAddress());
        }
        else
        {
            System.out.println("No such entry: " + accountEntry);
        }
    }
    
    /**
     * Returns all of the accounts that have been created and kept
     * @System.out.println Prints the specified text/variables to the system
     * @for For as long as there is an account proceed
     */
    public void getAllAccounts()
    {
        if (getNumberOfAccounts() > 0)
            {
                for (Account account: accounts)
                {
                    System.out.println(accounts);
                }
            }
    }    
    
    /**
     * Returns the number of accounts that have been registered in the array list
     * @return Returns number of accounts
     * @.size() The size of the array list
     */
    public int getNumberOfAccounts()
    {
        return accounts.size();
    }
    
    /**
     * Removes the specified account through the use of accountEntry
     * @.remove Removes the account from the array list
     * @param accountEntry specifies the index position of the account to be removed
     */
    public void removeAccount(int accountEntry)
    {
        accounts.remove(accountEntry);
    }
    
    /**
     * Removes the account through the use of the accountNumber 
     * @param accountNumber The number that is associated with the account, 
     * specified in account class
     * @for For as long as there is a new account, proceed
     * @if If the account number equals the getAccountNumber() then remove the account
     * @return true, returns true so long as the if statement is accomplished
     * @return false, returns false so long as the if statement fails
     */
    public boolean removeAccount(String accountNumber)
    {
        int index = 0;
        for (Account account: accounts)
        {
            if (accountNumber.equals(account.getAccountNumber()))
            {
                accounts.remove(index);
                return true;
            }
        }
        return false;
    }
    
    /**
     * Searches for a specified account using the account number
     * @param accountNumber The account number allocated to the account
     * @return Returns the index number of the account number if it exists
     */
    public int search(String accountNumber)
    {
        return accounts.indexOf(accountNumber);
    }
}
