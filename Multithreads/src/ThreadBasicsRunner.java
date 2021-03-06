// extends Thread
// implements  Runnable

class Task1 extends Thread {
	@Override
	public void run() { // signature
		System.out.print("\n task1 Started");

		for (int i = 101; i <= 199; i++) {
			System.out.print(i + " ");
		}

		System.out.print("\n task 1 Done");

	}
}

class Task2 implements Runnable {

	@Override
	public void run() {
		System.out.print("\n task2 Started");

		for (int i = 201; i <= 299; i++) {
			System.out.print(i + " ");
		}

		System.out.print("\n task 2 Done");

	}

}

public class ThreadBasicsRunner {

	public static void main(String[] args) throws InterruptedException {
		
	
		// Task 1
		System.out.print("\n task 1 kicked off");
		Task1 task1 = new Task1();
		task1.setPriority(1);
		task1.start();
		
		System.out.print("\n task 2 kicked off");

		// task 2
		Task2 task2 = new Task2();
		Thread task2Thread = new Thread(task2);
		task2Thread.setPriority(10);
		task2Thread.start();



		// wait till 1 is completed

		task1.join();
		task2Thread.join();

		System.out.println("\n task 3 kicked off");
		// Task 3

		for (int i = 301; i <= 399; i++) {
			System.out.print(i + " ");
		}

		System.out.println("\n task 3 Done");
		System.out.println("\n main Done");

	}

}
