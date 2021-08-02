package loops;

public class LoopsRunner {

	public static void main(String[] args) {
		MyNumber number = new MyNumber(9);

		boolean isPrime = number.isPrime(5);
		System.out.println("isPrime " + isPrime);

		int sum = number.sumUptoN(10);
		System.out.println("sunUptoN" + sum);

		int sumOfDivisors = number.sumOfDivisors();

		number.printANumberTriangle(10);

	}

}
