import java.util.*;
public class GuessingNum {

  public static void main(String[] args) {
    Random rand = new Random();
    int numberToGuess = rand.nextInt(100) + 1;
	System.out.println("Guessed  number :\t"+numberToGuess);
    Scanner scanner = new Scanner(System.in);
    int maxTries = 15; 
    int tries = 0;

    while (tries < maxTries) {
      System.out.print("Enter your guess (1-100): ");
      int guess = scanner.nextInt();
      tries++;

      if (guess == numberToGuess) {
        System.out.println("Congratulations! You guessed the number in " + tries + " tries.");
        break;
      } else if (guess < numberToGuess) {
        System.out.println("Your guess is too low. Try again.");
      } else {
        System.out.println("Your guess is too high. Try again.");
      }
    }

    if (tries == maxTries) {
      System.out.println("Sorry, you ran out of tries. The number was: " + numberToGuess);
    }
  }
}

