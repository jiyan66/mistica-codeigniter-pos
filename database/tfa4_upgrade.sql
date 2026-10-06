-- Run this once on an existing TFA3 database.
-- The initial password for all existing users will be: Password123!

ALTER TABLE `users`
    ADD COLUMN `password` VARCHAR(255) NULL AFTER `avatar`;

UPDATE `users`
SET `password` = '$2y$12$Je3tMJKymxIkHH3SF2TF2eysvo6UhAuoP3HSIMhV4P3/CBakgX802'
WHERE `password` IS NULL OR `password` = '';

ALTER TABLE `users`
    MODIFY `password` VARCHAR(255) NOT NULL;
