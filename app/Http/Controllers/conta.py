class Conta: 
    numero = 0
    titular = ""
    saldo = 0 limite = 0 

    
    def __init__(self, numero, titular, saldo, limite):
        self.numero = numero
        self.titular = titular
        self.saldo = saldo
        self.limite = limite

    def deposita(self, valor):
        self.saldo += valor

    def saca(self, valor):
        if (self.saldo < valor):
            return False
        else:
        self.saldo -= valor
        return True

    def extrato(self):
        print("numero:{} \nsaldo: {}".format(self.numero, self.saldo))

    def transfere_para(self, destino, valor):
        retirou = self.saca(valor)
        if (retirou == false):
            return False
        else:
            destino.deposita(valor)
            return True

conta1 = Conta(123, 'Marcelinho', 50, 5000)
tipo= type(conta1)
print(tipo)
print(conta1.titular)
print(conta1.numero)

conta2 = Conta(124, 'Joana', 100, 5000)
tipo = type(conta2)
print(tipo)
print(conta2.titular)
print(conta2.numero)
#acho que tá no lugar errado mas blz kk