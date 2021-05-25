
/**
 * A class that maintains information on a book.
 * This might form part of a larger application such
 * as a libray system, for instance.
 * 
 * @author (your name) 
 * @version (a version number or a date)
 */
public class Book
{
  // The fields
  private String author;
  private String title;
  private int pages;
  private String refNumber;
  private int borrowed = 0;
  
  /**
   * Set the author and title fields when this object
   * is constructed.
   * @param bookAuthor  the name of the authorof the book
   * @param bookTitle   the name of the book.
   */
  public Book (String bookAuthor, String bookTitle)
  {
      author = bookAuthor;
      title = bookTitle;
  }
  
  public String getAuthor()
  {
      return author;
  }
  
  public String getTitle()
  {
      return title;
  } 
  
  public void printAuthor()
     {
         System.out.println(author);
     }
  
  public void printTitle()
  {
      System.out.println(title);
    }
    
    public int getPages()
    {
        return pages;
    }
    
    public void printDetails()
    {
        System.out.println("Author: " + author + " Title: " + title + " Pages: " + pages + " Ref: " + refNumber + " Borrows: " + borrowed);
    }
    
    public String getRefNumber()
    {
        return refNumber;
    }
    public void setRefNumber(String ref)
    {
        int stringLength = refNumber.length();
        if (stringLength == 0)
        {
            refNumber = "ZZZ";
        }
        else
        {
            refNumber = refNumber;
        }
    }
    public int borrow()
    {
        borrowed = borrowed + 1;
        return borrowed;
    }
    
    public int getBorrowed()
    {
        return borrowed;
    }
}

