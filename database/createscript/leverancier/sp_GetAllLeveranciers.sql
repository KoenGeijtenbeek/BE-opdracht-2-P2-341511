DROP PROCEDURE IF EXISTS SP_GetAllLeveranciers;

DELIMITER $$

CREATE PROCEDURE SP_GetAllLeveranciers()
BEGIN
    SELECT LVRC.Id
          ,LVRC.Naam
          ,LVRC.ContactPersoon
          ,LVRC.LeverancierNummer
          ,LVRC.Mobiel
          ,COUNT(DISTINCT PPLV.ProductId) AS VerschillendeProducten
    FROM Leverancier AS LVRC
    LEFT JOIN ProductPerLeverancier PPLV ON PPLV.LeverancierId = LVRC.Id
    GROUP BY LVRC.Id;
END$$

DELIMITER ;