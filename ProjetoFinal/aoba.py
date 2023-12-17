from sklearn.linear_model import LinearRegression
import numpy as np

# Dados de treinamento
tempos = np.array([[9], [5], [8.5], [6.2], [4.5], [6.7], [7.5], [6.1]])
pacotes = np.array([[5], [4], [5], [3], [2], [2], [4], [3]])
distancias = np.array([[98], [55], [98], [99], [52], [76], [79], [64]])

# Criando um modelo de Regressão Linear Múltipla
modelo = LinearRegression()

# Treinando o modelo com os dados de treinamento
modelo.fit(np.hstack((distancias, pacotes)), tempos)

# Fazendo previsões para uma distância de 70 e 6 pacotes a serem entregues
distancia_teste = np.array([[70, 6]])
tempo_estimado = modelo.predict(distancia_teste)

print("O tempo estimado de viagem para uma distância de 70 e 6 pacotes é: ", tempo_estimado)