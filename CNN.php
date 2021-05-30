<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CNN theory</title>
  </head>

  <body>
    Structure of a CNN
In his paper, Yann Lecun proposed the input images fed into the CNN to have three layers: height, width, and depth (shown below). The reason for the three layers is due to the nature of the image. The height and width of the picture require two layers, and the third layer is for the color of the image (some variation of the colors red, blue and green) (Lightning Blade,2018).
4
Figure 2.An example of a 4x4 image being fed into a CNN (Alexandr Honchar, 2017).
Convolutions and poolings are then repeated over and over on the image. This is so that the features of the image will be detected.

1.The Convolutional layer
Convolutions take place in the convolutional layer of the CNN. The word convolution in mathematics means combining two functions to create a third one. In the CNN, convolutions are used to produce a feature map, by using a filter. The filter is a set window or square that slides across the image (shown in figure 3). A mathematical operation is performed and then the output of that operation sent to the feature map, the filter then moves to the right this is known as a stride. Once the filter reaches the end of the first row, it moves down to the second row and repeats the process. The feature map is the computerized version of the biological receptive field. The stride will produce a feature map that has a smaller size, so the concept of padding (where a pixel value of zero is surrounded by a padding of zeros) is used to maintain the same size. Through the use of padding, the performance of the CNN is increased as the filter fits the input, not wasting any pixels.(Hien, Dang Ha, 2017)
5
Figure 3. The destination pixel is on the feature map, the source pixel is on the input image (Daphne Cornelisse, 2018)
When a feature map of a different filter is used (for instance in figure 3 the filter used is 3x3), this produces a different feature map. This process repeats, producing several feature maps. The feature maps are stacked on top of each other (another mathematical operation is used to “add” all the layers together), and this stacked map what is outputted by the convolutional layer of the CNN.
Figure 4.The lines represent mathematical operations from one map to another.(Dang ha The Helian,2017).
2.Activation Functions
Activation functions are mathematical equations that are used to introduce non-linearity into the CNN. What is outputted by the convolutional layer is the stacked feature map. However, the mathematical operations that were used to calculate each map (such as the addition of pixels) are linear. This is a huge problem as computer image recognition cannot be modeled by a simple linear relationship. It is not as straightforward as recognizing the addition of pixels in each image. Image recognition is a more complex process that requires a more complex pattern to be found. Therefore by using activation functions the stacked feature map is represented as a complex pattern as opposed to a linear sum (Sagar Sharma, 2017). This complex pattern is modeled differently based on the activation function used. Some examples of activation functions are tanh, RELU and sigmoid but these will be explored in more depth,later on in the investigation portion of the EE.
6
3.The Pooling Layer
The purpose of the pooling layer is to reduce the size of the stacked feature map. This layer is almost always used as with a reduced stacked feature map, there are fewer parameters, computations, training time as well as a reduced risk of overfitting. Overfitting is a term used in statistics that refers to a data model being biased or heavily affected by a small amount of data. The most common way of using pooling is through the max pooling method (Ardent Dertat, 2017). This is when only the highest pixel value (within a certain window) of the feature map is taken (shown in figure.5 below). This way, the accuracy of the pixel value is kept and the new feature map is condensed.
Figure 5. A two-dimensional representation of max pooling. The window is 2x2, showing the highest pixel value being taken and outputted in the new map. (Max pool)
7
4.Classification Layer
After both the convolutional and pooling layers of the CNN, the digits are now ready to be trained. The classification layer is where the CNN assigns a probability to the image being predicted by the CNN through the use of a multi-layered perceptron or MLP. For example, when training on handwritten digits by MNIST, the computer will determine the probability for each digit from 0-9 (shown in figure 6 below).
Figure 6. The CNN classification of digits (kdnuggets,2016)
5.Flattening
Classification is achieved through a fully connected layer also known as multi-layered perceptron (MLP). This layer will be described shortly, but it is important to note that it only accepts one-dimensional data. Recall that what is sent after the pooling layer is in three dimensions (length, width, colors). In order to
8
combat this problem, the three-dimensional stacked feature map is then flattened into a one-dimensional array. This is known as the flattening step. Now the one-dimensional array is ready to be put into an multi-layered perceptron so that digits can be classified.
Structure of a multi-layered perceptron
The structure of the multi-layered perceptron (MLP) is similar to figure 7 shown below. It is primarily composed of three parts the input, hidden and output layers (Kang Nahua, 2017). The input layers (shown in blue) is where the one-dimensional stacked feature map from the previous step is inputted. The hidden layers are shown in purple, note that each perceptron (or purple circle) is connected to all of the inputs (blue circles). In the picture, there is only one hidden layer but good neural networks (and CNN’s) require more. Finally, the output layer is shown in orange.
Figure 7 Structure of a MLP (Nahua Kang,2017)
MLP’s work by adjusting weights and biases with backpropagation until classification is sufficiently accurate. To understand this statement let us consider one perceptron (purple circle). Mathematically,
each perceptron in the hidden layer is where xi is each data inputted (or in other words the sum of
each layer). However, instead of adding each input it is first multiplied by a weight w and the added by a
bias b before being summed (Making each perceptron in the hidden layer equal to ).The bias
is just a set number that measures how easy it is for a perceptron to reach a value of 1 or in biological terms how likely it is for a perceptron to fire. This will be useful later when training the MLP to recognize 9
digits. The concept of activation functions will now have to be introduced again, (because the data is not
linear), making the equation for some activation function σ.
1.How the MLP learns to recognize digits.
All of the perceptrons sum up to the output layer where each handwritten digit is given a probability by
the equation . The highest probability is selected as the number the MLP chooses.
Initially, the predicted numbers by the MLP will be inaccurate. This is where the backpropagation and gradient descent are introduced.
2.Backpropagation for MLP digit recognition
The MLP’s predicted value is compared with the correct output so that an error function can be calculated. If we were to graph in 3 dimensions where x is the weight, y is the bias and z is the cost function. Every possible outcome of the cost function would be represented. This means that for certain weights and bias (x and y), at the local minimum of the graph, the cost function will be minimized, maximizing the classifier's accuracy. An example is shown below .
Figure 8. Example cost function graph (Yan Holtz,2017)
3.Gradient Descent for digit recognition
While the mathematics is too advanced and not necessary to this paper, it is important to recognize that Gradient Descent refers to an algorithm where the minimum of the cost function graph (which would give 10
the best weight and bias) are used. It uses the concepts of partial derivatives in order to reach the lowest cost value. Where each change in the x and y-direction (weight and bias) gets updated into the previous
perceptron equation . Ultimately, the adjustments of w and b values will yield the
minimum cost, or in other words, the MLP (and therefore the entire CNN) will be trained to recognize handwritten digits accurately.
Summary of CNN functionality
The entire process of a CNN can be visualized by the interactive visualization for neural networks project by Adam Harvey . It represents a CNN with two convolutional layers (2nd and 3rd layer), that produces 6 feature maps each. They are then put through two pooling layers (4th and 5th layer), the digit is now unrecognizable and reduced in size.Flattening (6th layer or first line) turns the entire set of data into a one-dimensional array. Finally, the training from the MLP in order to reach a prediction (top-most scale) is shown at the very top. As shown in the picture the numbers 3 is highlighted in blue (on the scale) and was the first guess of the CNN.


  </body>
</html>
