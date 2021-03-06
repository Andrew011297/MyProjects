/**
 * TimedListOps.java
 *   Data are in a List<E> (either an ArrayList<E> or a LinkedList<E>)
 *   and random fetches are timed.
 *
 * Generic type E is presumed to have a sensible toString() method.
 */
import java.util.*;

public class TimedListOps<E> {
  private List<E> data = null;

  public TimedListOps(List<E> lst) { data = lst; }

  public int dLen() { return data.size(); }
 
  public long fetch(int n) {
    E e = null;
    long tm = 0l, st = System.nanoTime();
    e = data.get(n);
    tm = System.nanoTime() - st;
    System.out.printf("Fetched **%s** in %d nanosec\n", e, tm);
    return tm; 
  }

  public long insert(int n, E e) {
    long tm = 0l, st = System.nanoTime();
    data.add(n, e);
    tm = System.nanoTime() - st;
    System.out.printf("Inserted **%s** at pos %d in %d nanosec\n", e, n, tm);
    return tm;
  }

  public long delete(int n) {
    E e = null;
    long tm = 0l, st = System.nanoTime();
    e = data.remove(n);
    tm = System.nanoTime() - st;
    System.out.printf("Deleted **%s** from pos %d in %d nanosec\n", e, n, tm);
    return tm;
  } 
}
