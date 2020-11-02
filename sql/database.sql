/* Criar banco de dados */
CREATE DATABASE IF NOT EXISTS odontomax;

/* Selecionar o banco de dados */
USE odontomax;

/* Usuário : Tabela forte */
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    CONSTRAINT `pk_user` PRIMARY KEY (`id`)
);

/* Paciente : Tabela forte */
CREATE TABLE IF NOT EXISTS `patients` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `cpf` VARCHAR(20) NOT NULL,
    `rg` VARCHAR(20),
    `birth` DATE NOT NULL,
    `genre` CHAR(1) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `cellphone` VARCHAR(20) NOT NULL,
    `telephone` VARCHAR(20),
    `cep` VARCHAR(10) NOT NULL,
    `address` VARCHAR(20) NOT NULL,
    `number` VARCHAR(20) NOT NULL,
    `district` VARCHAR(20) NOT NULL,
    `complement` VARCHAR(20),
    `city` VARCHAR(20) NOT NULL,
    `state` CHAR(2) NOT NULL,
    CONSTRAINT `pk_patient` PRIMARY KEY (`id`)
);

/* Dentista : Tabela forte */
CREATE TABLE IF NOT EXISTS `dentists` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `cpf` VARCHAR(20) NOT NULL,
    `cro` VARCHAR(20) NOT NULL,
    `rg` VARCHAR(20),
    `birth` DATE NOT NULL,
    `genre` CHAR(1) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `cellphone` VARCHAR(20) NOT NULL,
    `telephone` VARCHAR(20),
    `cep` VARCHAR(10) NOT NULL,
    `address` VARCHAR(20) NOT NULL,
    `number` VARCHAR(20) NOT NULL,
    `district` VARCHAR(20) NOT NULL,
    `complement` VARCHAR(20),
    `city` VARCHAR(20) NOT NULL,
    `state` CHAR(2) NOT NULL,
    CONSTRAINT `pk_dentist` PRIMARY KEY (`id`)
);

/* Procedimento: Tabela forte */
CREATE TABLE IF NOT EXISTS `procedures` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(20) NOT NULL,
    CONSTRAINT `pk_procedure` PRIMARY KEY (`id`)
);

/* Consulta : Tabela fraca */
CREATE TABLE IF NOT EXISTS `consultations` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `patient_id` INT NOT NULL,
    `dentist_id` INT NOT NULL,
    `procedure_id` INT NOT NULL,
    `date` DATE NOT NULL,
    `hour` TIME NOT NULL,
    CONSTRAINT `pk_consultation` PRIMARY KEY (`id`),
    CONSTRAINT `fk_consultation_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
    CONSTRAINT `fk_consultation_dentist` FOREIGN KEY (`dentist_id`) REFERENCES `dentists` (`id`),
    CONSTRAINT `fk_consultation_procedure` FOREIGN KEY (`procedure_id`) REFERENCES `procedures` (`id`)
);

/* Histórico : Tabela fraca */
CREATE TABLE IF NOT EXISTS `history` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `patient_id` INT NOT NULL,
    `dentist_id` INT NOT NULL,
    `procedure_id` INT NOT NULL,
    `date` DATE NOT NULL,
    `hour` TIME NOT NULL,
    `description` TEXT NOT NULL,
    CONSTRAINT `pk_history` PRIMARY KEY (`id`),
    CONSTRAINT `fk_history_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
    CONSTRAINT `fk_history_dentist` FOREIGN KEY (`dentist_id`) REFERENCES `dentists` (`id`),
    CONSTRAINT `fk_history_procedure` FOREIGN KEY (`procedure_id`) REFERENCES `procedures` (`id`)
);

/* Inserir um novo usuário */
INSERT INTO `users` (name, email, password) VALUES ("Max D'Angelo", "max", "2ffe4e77325d9a7152f7086ea7aa5114");

/* Inserir um novo usuário */
INSERT INTO USUARIO (NOME_USUARIO, EMAIL_USUARIO, SENHA_USUARIO, CPF_USUARIO, RG_USUARIO, CRO_USUARIO, NASCIMENTO_USUARIO, GENERO_USUARIO, CELULAR_USUARIO, TELEFONE_USUARIO, CEP_USUARIO, ENDERECO_USUARIO, NUMERO_USUARIO, BAIRRO_USUARIO, COMPLEMENTO_USUARIO, CIDADE_USUARIO, ESTADO_USUARIO, TIPO_USUARIO) VALUES ("max", "contato@odontomax.com.br", "max", "111.111.111-11", "", "", "1990-01-01", "m", "11123456789", "", "07186090", "Rua Silvestre", "2020A", "Jardins", "", "São Paulo", "SP", "1");
INSERT INTO USUARIO (NOME_USUARIO, EMAIL_USUARIO, SENHA_USUARIO, CPF_USUARIO, RG_USUARIO, CRO_USUARIO, NASCIMENTO_USUARIO, GENERO_USUARIO, CELULAR_USUARIO, TELEFONE_USUARIO, CEP_USUARIO, ENDERECO_USUARIO, NUMERO_USUARIO, BAIRRO_USUARIO, COMPLEMENTO_USUARIO, CIDADE_USUARIO, ESTADO_USUARIO, TIPO_USUARIO) VALUES ("Rafael Menussi", "contato@odontomax.com.br", "max", "111.111.111-11", "", "", "1990-01-01", "m", "11123456789", "", "07186090", "Rua Silvestre", "2020A", "Jardins", "", "São Paulo", "SP", "2");

/* Listar todos os agendamentos */
SELECT a.*, d.NOME_USUARIO AS NOME_DENTISTA, p.NOME_USUARIO AS NOME_PACIENTE, pr.DESCRICAO_PROCEDIMENTO FROM AGENDAMENTO a INNER JOIN USUARIO d ON a.CODIGO_DENTISTA = d.CODIGO_USUARIO INNER JOIN USUARIO p ON a.CODIGO_PACIENTE = p.CODIGO_USUARIO INNER JOIN PROCEDIMENTO pr ON a.CODIGO_PROCEDIMENTO = pr.CODIGO_PROCEDIMENTO;