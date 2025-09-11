# Dormentes (Onboarding-KYC)

Os dormentes compõe teoricamente eixo com menor risco de contaminação, ao menos até as exigências de implementações de processos KYC personalizados para fornecedores diferentes.

## Dormente PF (model)

- Salvar: método para salvar campos individualmente na tabela dormente_pf.
- caminhoImagem: método para caminho da imagem/documento (repetido em várias partes do sistema).
- decryptToken: método para descriptografar token do aparelho (repetido em várias partes do sistema).
- salvaImageSelfTabelaPessoaFisica
- aprovarDireto
- concluirCadastro: este método está contaminando o eixo Pix na model e no controller tanto na versão PF quanto PJ.

## Dormente PJ (model)

- caminhoImagem: método para caminho da imagem/documento (repetido em várias partes do sistema).
- Salvar: método para salvar campos individualmente na tabela dormente_pj.
- concluirCadastro: este método está contaminando o eixo Pix na model e no controller tanto na versão PF quanto PJ.
