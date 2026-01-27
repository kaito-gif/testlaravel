-- CategorySeederで挿入されたデータを削除するSQL

-- ⚠️ 注意: productsテーブルに外部キー制約（onDelete('restrict')）があるため、
-- カテゴリーに商品が紐づいている場合は削除できません。
-- 削除前に、以下のクエリで使用状況を確認してください：
-- SELECT c.id, c.name, COUNT(p.id) as product_count 
-- FROM categories c 
-- LEFT JOIN products p ON c.id = p.category_id 
-- WHERE c.name IN ('家電', '食品', '衣類', '書籍')
-- GROUP BY c.id, c.name;

-- 方法1: 特定のカテゴリー名を削除（商品が紐づいていない場合のみ）
DELETE FROM categories WHERE name IN ('家電', '食品', '衣類', '書籍');

-- 方法2: 商品が紐づいているカテゴリーも削除したい場合（先にproductsテーブルのデータを削除）
-- DELETE FROM products WHERE category_id IN (SELECT id FROM categories WHERE name IN ('家電', '食品', '衣類', '書籍'));
-- DELETE FROM categories WHERE name IN ('家電', '食品', '衣類', '書籍');

-- 方法3: すべてのカテゴリーデータを削除（外部キー制約がある場合は注意）
-- DELETE FROM categories;
